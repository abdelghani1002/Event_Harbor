<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $events = Event::with('organizer')->latest()->where('status', 'published')->paginate(6);
        return view('home', compact('events', 'categories'));
    }
}
