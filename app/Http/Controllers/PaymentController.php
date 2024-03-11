<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;

class PaymentController extends Controller
{
    static function checkout(int $id)
    {
        $reservation = Reservation::where('id', $id)->first();
        $total = $reservation->event->ticket_price;
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "USD",
                "value" => number_format($total, 2, '.', '')
            ],
            "description" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque quae autem quis quidem odit\n provident nesciunt eum, fuga iste, rem itaque ad deleniti\n quam ratione quisquam tempore non totam qui. Aspernatur\n praesentium labore modi distinctio recusandae cumque \naccusamus ducim\nus eos excepturi, tempore, provident dolores? \nTenetur illo atque quo unde quibusdam!",
            "redirectUrl" => route('success'),
        ]);
        session()->put('paymentId', $payment->id);
        session()->put('reservationId', $reservation->id);
        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function success(Request $request)
    {
        $paymentId = session()->get('paymentId');
        $mollie_payment = Mollie::api()->payments->get($paymentId);
        if($mollie_payment->isPaid())
        {
            $reservationId = session()->get('reservationId');

            $payment = new Payment();
            $payment->payment_id = $paymentId;
            $payment->description = $mollie_payment->description;
            $payment->amount = $mollie_payment->amount->value;
            $payment->currency = $mollie_payment->amount->currency;
            $payment->payment_status = "Completed";
            $payment->payment_method = "Mollie";
            $payment->reservation_id = $reservationId;

            $payment->save();
            session()->forget('paymentId');
            session()->forget('reservationId');
            return ReservationController::store_ticket($reservationId);
        } else {
            return redirect()->route('cancel');
        }
    }

    public function cancel()
    {
        echo "Payment is cancelled. !!!!!";
    }
}
