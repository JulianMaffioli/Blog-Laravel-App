<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; //Adding the Post Model
use App\User; //Adding the User Model

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id =  auth()->user()->id;
        $user = User::find($user_id);
        return view('home')->with('posts',$user->posts);
    }
}
