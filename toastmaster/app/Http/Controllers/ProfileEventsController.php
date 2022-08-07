<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Events;
use App\Models\EventVolunteers;
use App\Models\EventLocations;

class ProfileEventsController extends Controller
{
    public function view()
    {
        $events = Events::orderBy('starts', 'ASC')->paginate(8);
        return view('profile/events', ['User'=>Auth::user(),'Events'=>$events]);
    }

    public function location($id)
    {
        $location = EventLocations::find($id);
        return view('profile/location', ['Location'=>$location]);
    }

    public function volunteer(Request $request)
    {
        $request->validate([
            'event_role' => ['required', 'numeric']
        ]);
        $eventRole = EventVolunteers::find($request->event_role);
        $eventRole->user_id = Auth::id();
        $eventRole->save();
        return back()->with('message','Event Updated');
    }
}