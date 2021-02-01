<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    // Funzione che mi permette di recuperare tutti i miei post dal DB e restituirmeli in formato jason così da essere facilemnte fruibili con il javascript
    public function index() {
        $posts = Post::all();
        return response()->json([
            'success' => true,
            'results' => $posts
        ]);
    }
}
