<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\View\View;


class PageController extends Controller
{
    /* nota: método carga de forma inmediata las relaciones dadas para todos los modelos de la colección
    $posts = Post::all()->load(['user']);
    $posts = Post::with('user')->latest()->get();
    */
    public function dashboard(): View
    {
        $posts = Post::latest()->get();

        // dd($posts->toJson(JSON_PRETTY_PRINT)); // nota: imprime 

        return view('dashboard', ['posts' => $posts]);
    }
}
