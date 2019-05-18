<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function view($id)
    {

        try {
            $post = Post::findOrFail($id);

        } catch (ModelNotFoundException $exception) {
            abort(404, 'Page not found');
        }
        return view('post', compact('post'));
    }
}
