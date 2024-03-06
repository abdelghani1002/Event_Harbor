<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'date',
        'place',
        'tickets_number',
        'ticket_price',
        'photo_src',
        'reservation_type',
        'status',
    ];


    /**
     * Define the event category
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Define the event organizer
     */
    public function organizer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
