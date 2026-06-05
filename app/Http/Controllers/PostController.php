<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'body' => ['required', 'string', 'max:1000'],
        ]);


        // \App\Models\Post::create   //Nota: tambien se puede crear de esta manera
        $request->user()->posts()->create($request->all());
        
        return back();
    }
}
