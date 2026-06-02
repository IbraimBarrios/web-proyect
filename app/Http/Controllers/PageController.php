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
    public function dashboard(Request $request): View
    {

        // $request->all(); 
        // $request->get('for-my'); 
        // $request->user();  //nota obtiene el usuario logeado
        // $request->user()->id; 

        if ($request->get('for-my')) {
            $posts = Post::where('user_id', $request->user()->id)->latest()->get();
            // $posts = $request->user()->posts; // obtiene los post del usuario logeado. mismo resultado que optiene posts como la linea de arriba 
        } else {
            $posts = Post::latest()->get();
        }

        return view('dashboard', ['posts' => $posts]);
    }
}
