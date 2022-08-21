<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Posts;
use App\Models\Events;
use App\Models\EventLocations;
use App\Models\EventVolunteers;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::orderBy('name', 'DESC')->paginate(15);
        return view('admin/users', ['User'=>Auth::user(),'Users'=>$users]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'numeric']
        ]);
        $user = User::find($request->user_id);
        $user->hasVolunteered->user_id = NULL;
        $user->delete();
    }

    public function viewAddEvent()
    {
        $locations = EventLocations::orderBy('Address_1')->get();
        return view('admin/events/add',['Locations'=>$locations]);
    }

    public function addEvent(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'date'  => ['required','date_format:Y-m-d'],
            'starts'=> ['required','date_format:H:i'],
            'ends'  => ['required','date_format:H:i'],
            'location' => ['required','numeric'],
            'roles' => ['string']
        ]);

        $event = new Events();
        $event->title       = $request->title;
        $event->description = $request['events-trixFields']['content'];
        $event->starts      = date('Y-m-d H:i:s', strtotime("$request->date $request->starts"));
        $event->ends        = date('Y-m-d H:i:s', strtotime("$request->date $request->starts"));
        $event->location    = $request->location;
        $event->save();

        $event_id = $event->id;
        $roles = array();
        foreach( explode(',', $request->roles) as $r)
        {
            $roles[] = ["Role"=>$r,"EventID"=>$event_id];
        }
        EventVolunteers::insert($roles);
        return back()->with('message','Event Created');
    }

    public function viewEditEvent($id)
    {
        $event = Events::find($id);
        $volutenteers = [];
        foreach($event->volunteerRoles()->get() as $v)
        {
            $volutenteers[] = $v->Role;
            
        }
        $locations = EventLocations::orderBy('Address_1')->get();
        return view('admin/events/edit',['Event'=>$event, 'Locations'=>$locations, 'Volunteers'=>implode(',',$volutenteers)]);
    }

    public function updateEvent(Request $request)
    {
        $request->validate([
            'id'    => ['required','numeric'],
            'title' => ['required'],
            'date'  => ['required','date_format:Y-m-d'],
            'starts'=> ['required','date_format:H:i'],
            'ends'  => ['required','date_format:H:i'],
            'location' => ['required','numeric'],
            'roles' => ['string']
        ]);

        $event = Events::find($request->id);
        $event->title       = $request->title;
        $event->description = $request->description;
        $event->starts      = date('Y-m-d H:i:s', strtotime("$request->date $request->starts"));
        $event->ends        = date('Y-m-d H:i:s', strtotime("$request->date $request->starts"));
        $event->location    = $request->location;
        $event->save();

        $roles = array();
        foreach( explode(',', $request->roles) as $r)
        {
            $roles[] = ["Role"=>$r,"EventID"=>$request->id];
        }
        EventVolunteers::where('EventID',$request->id)->delete();
        EventVolunteers::insert($roles);
        return back()->with('message','Event Updated');
    }

    public function deleteEvent(int $id)
    {
        Events::find($id)->delete();
        EventVolunteers::where('EventID',$id)->delete();
        return redirect('profile/events')->with('message','Event Deleted');
    }

    public function viewAddLocation()
    {
        return view('admin/locations/add');
    }

    public function viewEditLocation(int $id)
    {
        $location = EventLocations::find($id);
        return view('admin/locations/edit', ['location'=>$location]);
    }

    public function addLocation(Request $request)
    {
        $request->validate([
            'Address_1' => ['required','string'],
            'Address_2' => ['string'],
            'Address_3' => ['string'],
            'City'      => ['string'],
            'Postcode'  => ['string'],
            'County'    => ['string'],
            'Country'   => ['string'],
            'Tel'       => ['string'],
        ]);
        $location = new EventLocations;
        $location->fill($request->all());
        $location->save();
        return redirect('profile/locations')->with('message','Location Added');
    }

    public function editLocation(Request $request)
    {
        $request->validate([
            'id'        => ['required', 'numeric'],
            'Address_1' => ['required','string'],
            'Address_2' => ['string'],
            'Address_3' => ['string'],
            'City'      => ['string'],
            'Postcode'  => ['string'],
            'County'    => ['string'],
            'Country'   => ['string'],
            'Tel'       => ['string'],
        ]);
        $location = EventLocations::find($request->id);
        $location->fill($request->all());
        $location->save();
        return back()->with('message','Event Updated');
    }

    public function viewAddPosts()
    {
        return view('admin/posts/add');
    }

    public function addPost(Request $request)
    {
        $request->validate([
            'title'   => ['required','string'],
            'posts-trixFields' => ['required']
        ]);
        $post = new Posts();
        $post->title = $request->title;
        $post->content = $request['posts-trixFields']['content'];
        $post->save();
        return redirect('profile/posts')->with('message','Location Added');
    }

    public function viewEditPost($id)
    {
        $post = Posts::find($id);
        return view('admin/posts/edit',['post'=>$post]);
    }

    public function editPost(Request $request)
    {
        $request->validate([
            'id'      => ['required', 'numeric'],
            'title'   => ['required','string'],
            'content' => ['required']
        ]);
        $post = Posts::find($request->id);
        $post->fill($request->all());
        $post->save();
        return redirect('profile/posts')->with('message','Post Updated');
    }

    public function deletePost($id)
    {
        Posts::find($id)->delete();
        return redirect('profile/posts')->with('message','Post Deleted');
    }
}
