<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function view()
    {
        return view('profile/profile', ['User'=>Auth::user()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ]);
        $user =Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        return back()->with('message','Profile Updated');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password'  => ['required','string', 'max:255'],
            'confirm'   => ['required','string', 'same:password']
        ]);
        $user =Auth::user();
        $user->password = Hash::make($request['password']);
        $user->save();
        return back()->with('message','Password Updated');
    }
}