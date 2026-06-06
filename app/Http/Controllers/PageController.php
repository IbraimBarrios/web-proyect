<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\View\View;


class PageController extends Controller
{
    public function dashboard(Request $request): View
    {

        dd(
            $request->user()->friendsFrom()->get(),
            $request->user()->friendsTo()->get(),
        );

        if ($request->get('for-my')) {
            $posts = Post::where('user_id', $request->user()->id)->latest()->get();
        } else {
            $posts = Post::latest()->get();
        }

        return view('dashboard', ['posts' => $posts]);
    }
}
