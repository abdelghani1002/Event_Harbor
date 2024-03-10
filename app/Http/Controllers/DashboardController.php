<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->hasRole('admin')) {
            $users_count = User::count();
            $events_count = Event::count();
            $reservations_count = Reservation::count();
            $reservations = Reservation::where('status', 'accepted')->with('event')->get();

            $total_revenue = $reservations->sum(function ($reservation) {
                return $reservation->event->ticket_price;
            });
            return view('dashboard', compact('users_count', 'events_count', 'reservations_count', 'total_revenue'));
        }
        return redirect()->route("events.index");
    }
}
