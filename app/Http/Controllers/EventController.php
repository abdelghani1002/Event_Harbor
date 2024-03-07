<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasRole("organizer"))
            $events = Event::latest()->where('user_id', auth()->id())->paginate(6);
        $events = Event::latest()->paginate(6);
        return view("admin.events.index", compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.events.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $event = new Event($request->validated());
        $event->user_id = auth()->id();
        $event->category_id = $request->category_id;
        if ($request->hasFile('photo')) {
            $photoName = uniqid("event_") . '.' . $request->photo->extension();
            if (!$request->photo->move(public_path('storage/photos'), $photoName))
                return redirect()->route("events.create")->with('error', "Error wihing storing category photo");
            $event->photo_src = $photoName;
        }
        $event->save();
        return redirect()->route("events.index", [], 201)->with('success', "Event created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view("admin.events.show", compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $categories = Category::all();
        return view("admin.events.edit", compact('event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            if (file_exists(public_path('storage/photos/') . $event->photo_src))
                unlink(public_path('storage/photos/') . $event->photo_src);
            $photoName = uniqid("event_") . '.' . $request->photo->extension();
            $data['photo_src'] = $photoName;
            if (!$request->photo->move(public_path('storage/photos'), $photoName))
                return redirect()->route("categories.create")->with('error', "Error wihing storing event photo");
        }
        $event->update($data);
        return redirect()->route("events.index", [], 201)->with('success', "Event updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if (file_exists(public_path('storage/photos/') . $event->photo_src))
            unlink(public_path('storage/photos/') . $event->photo_src);
        $event->delete();
        return redirect()->back()->with("success", "Event has been deleted successfully");
    }
}
