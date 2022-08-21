<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Events;
use App\Models\Posts;


class HomeController extends Controller
{
    public function view()
    {
        $posts = Posts::orderBy('created_at', 'DESC')->paginate(10);
        $events = Events::where('starts','>=',Carbon::now()->format('d-m-Y'))->orderBy('starts','DESC')->paginate(10);
        return view('home', ['posts'=>$posts, 'events'=>$events]);
    }

}