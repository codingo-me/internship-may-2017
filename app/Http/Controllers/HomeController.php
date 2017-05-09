<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();

        return view('home', compact('events'));
    }

    public function postHome(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $event = new Event();
        $event->title = $request->get('title');
        $event->description = $request->get('description');
        $event->user_id = auth()->user()->id;
        $event->save();

        return redirect()->back()
            ->with('status', 'success')
            ->with('message', 'Uspješno ste dodali događaj.');
    }
}
