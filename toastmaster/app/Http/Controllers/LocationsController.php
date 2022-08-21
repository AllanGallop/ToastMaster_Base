<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\EventLocations;

class LocationsController extends Controller
{
    public function view($id)
    {
        $lcoation = EventLocations::find($id);
        return view('location', ['Location'=>$location]);
    }
    public function viewAll()
    {
        $locations = EventLocations::orderBy('Address_1', 'DESC')->paginate(15);
        return view('profile/locations', ['locations'=>$locations]);
    }
}