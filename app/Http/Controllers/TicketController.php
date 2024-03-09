<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Barryvdh\DomPDF\Facade\Pdf;

class TicketController extends Controller
{
    static function generate(Reservation $reservation)
    {
        $data = [
            'title' => 'Welcome to EVENT HarBor',
            'date' => date('m/d/Y'),
            'reservation' => $reservation
        ];
        $pdf = PDF::loadView('components.ticket', $data);
        return $pdf;
    }

    public function download(Event $event)
    {
        $reservation = $event->reservations->where("user_id", auth()->id())->first();
        if ($reservation->status !== 'accepted') {
            return redirect()->back()->with("error", "Your reservation has not been yet accepted by the organizer!.");
        }
        $ticket_path = public_path('storage/tickets/ticket_' . $reservation->user_id . '_' . $reservation->event_id . '.pdf');
        return response()->download($ticket_path);
    }
}
