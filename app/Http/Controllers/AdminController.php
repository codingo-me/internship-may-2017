<?php

namespace App\Http\Controllers;

use App\Models\Event;

class AdminController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->get();

        return view('admin', compact('events'));
    }
}