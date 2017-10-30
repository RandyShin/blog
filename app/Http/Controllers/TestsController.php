<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use \App\Category;

class TestsController extends Controller
{
    public function getIndex ()
    {
        $posts = \App\Post::with('category')->latest()->paginate(5);
        return view('test', compact('posts'));
    }
}
