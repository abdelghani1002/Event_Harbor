<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $user_id;
    protected $event_id;
    protected $status;

    protected $fillable = [
        'user_id',
        'event_id',
        'status'
    ];

    /**
     * Define the reservation client
     */
    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Define the reservation event
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
