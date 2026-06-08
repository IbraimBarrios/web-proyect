<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\View\View;


class PageController extends Controller
{
    public function dashboard(Request $request): View
    {
        if ($request->get('for-my')) {
            $user = $request->user();

            $friends_from_ids = $user->friendsFrom()->pluck('users.id');
            $friends_to_ids = $user->friendsTo()->pluck('users.id');
            $users_ids = $friends_from_ids->merge($friends_to_ids)->push($user->id);

            $posts = Post::whereIn('user_id', $users_ids)->latest()->get();
        } else {
            $posts = Post::latest()->get();
        }

        return view('dashboard', ['posts' => $posts]);
    }

    public function profile(User $user)
    {
        $posts = $user->posts()->latest()->get();

        return view('profile', ['posts' => $posts, 'user' => $user ]);
    }
}
