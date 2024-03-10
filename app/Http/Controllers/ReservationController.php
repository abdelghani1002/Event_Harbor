<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Notifications\ReservationAcceptedNotification;
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
        $reservation->save();
        if ($event->reservation_type === 'manual') {
            return redirect()->back()->with('infos', 'Your candidat has been registred. Please wait for organizer validation.');
        }
        return PaymentController::checkout($reservation->id);
    }

    static function store_ticket($id)
    {
        $reservation = Reservation::find($id);
        $ticket = TicketController::generate($reservation);
        if ($ticket) {
            $pdfPath = public_path('storage/tickets/ticket_' . $reservation->user_id . '_' . $reservation->event_id . '.pdf');
            $ticket->save($pdfPath);
            $reservation->status = 'accepted';
            $reservation->save();
            return redirect()->back()->with('success', 'Your ticket has been saved.');
        }
        return redirect()->back()->with('error', 'Error withing generate your ticket!');
    }

    public function edit(Request $request, Reservation $reservation)
    {
        $status = $request->status;
        $reservation->update(['status' => $status]);
        if ($status == 'accepted') {
            self::store_ticket($reservation);
            $reservation->client->notify(new ReservationAcceptedNotification($reservation));
        }
        return redirect()->back()->with('success', 'Reservation updated successfully');
    }
}
