<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'photo_src'
    ];

    /**
     * Return the events belongs to this category
     */
    public function events()
    {
        return $this->hasMany(Event::class, 'id');
    }
}
