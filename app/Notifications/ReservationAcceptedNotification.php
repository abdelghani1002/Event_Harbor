<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;

class ReservationAcceptedNotification extends Notification
{
    use Queueable;

    public $reservation;
    public $message;
    public $subject;
    public $fromEmail;
    public $mailer;
    /**
     * Create a new notification instance.
     */
    public function __construct($reservation)
    {
        $this->reservation = $reservation;
        $this->subject = "Reservation accepted";
        $this->fromEmail = "event@harbor.com";
        $this->mailer = "smtp";
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $checkoutUrl = URL::route('checkout', $this->reservation->id);

        return (new MailMessage)
            ->mailer($this->mailer)
            ->subject($this->subject)
            // ->attach(public_path('storage/tickets/ticket_' . $this->reservation->user_id . '_' . $this->reservation->event_id . '.pdf'))
            ->greeting("Hello " . $notifiable->name)
            ->line("🤩🤩 Your reservation accepted 🤩🤩")
            ->line("Checkout for your Ticket.")
            ->action('Checkout Now', $checkoutUrl)
            ->line("Enjoy," . $notifiable->name);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
