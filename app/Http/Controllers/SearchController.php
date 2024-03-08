<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function __invoke(Request $request)
    {
        if ($request->category) {
            $events = Event::with("category")->where("title", "like", "%" . $request->search_string . "%")
                ->where("category_id", $request->category)
                ->where('status', 'published')
                ->get();
        } else {
            $events = Event::with("category")
                ->where("title", "like", "%" . $request->search_string . "%")
                ->where('status', 'published')
                ->get();
        }

        if ($events->count()) {
            return response()->json([
                "status" => true,
                "events" => view('components.events', compact("events"))->render(),
                "token"  => $request->header("X-CSRF-TOKEN")
            ]);
        } else
            return response()->json([
                "status" => false
            ]);
    }
}
