<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Posts;

class PostsController extends Controller
{
    public function view()
    {
        $posts = Posts::paginate(15);
        return view('profile/posts', ['posts'=>$posts]);
    }
}