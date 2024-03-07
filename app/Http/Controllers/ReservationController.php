<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ReservationController extends Controller
{
    public function index()
    {
        $organizer = auth()->user();
        $reservations = Reservation::whereHas('event', function ($query) use ($organizer) {
            $query->where('user_id', $organizer->id);
        })->where('status', '!=', 'accepted')->latest()->paginate(6);
        return view("admin.reservations.index", compact('reservations'));
    }

    public function store(Event $event)
    {
        $client = auth()->user();
        $reservation = new Reservation();
        $reservation->user_id = $client->id;
        $reservation->event_id = $event->id;

        if ($event->reservation_type === 'manual') {
            $reservation->save();
            return redirect()->back()->with('infos', 'Your candidat has been registred. Please wait for organizer approval.');
        }
        $reservation->status = 'accepted';
        $reservation->save();
        // payment
        return redirect()->back()->with('success', 'Your candidat has been registred. Check your email for the ticket.');
    }

    public function edit(Request $request, Reservation $reservation)
    {
        $status = $request->status;
        $reservation->update(['status' => $status]);
        return redirect()->back()->with('success', 'Reservation updated successfully');
    }
}
