<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {

        $posts = Post::skip(0)->take(3)->latest()->get();
        return view('home', [
            'posts' => $posts
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
