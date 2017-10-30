<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Session;
use Auth;
use App\Tag;


class BlogController extends Controller
{
    
	public function getIndex() {

          $keyword = \Request::get('keyword');

        if (Auth::check()){
            $posts = Post::with('category')
                ->where('title', 'like', '%'.$keyword.'%')
                ->orwhere('body', 'like', '%'.$keyword.'%')
                ->orderBy('id', 'desc')
                ->paginate(15);

            $cnt = Post::all()->count();
        }else{
            $posts = Post::with('category')
                ->where('hide', '=', '0')
                ->where('title', 'like', '%'.$keyword.'%')
                ->orwhere('body', 'like', '%'.$keyword.'%')
                ->where('hide', '=', '0')
                ->orderBy('id', 'desc')
                ->paginate(15);



            $cnt = Post::where('hide','=','0')->count();
        }

        $tags = Tag::get();

        return view('blog.index')->withPosts($posts)->withCnt($cnt)->withTags($tags);



//
//		$posts = Post::orderBy('created_at','desc')->paginate(10);
//
//
//		return view('blog.index')->withPosts($posts);
	}

    public function getSingle($slug) {
    	// fetch from the DB based on slug
    	$post = Post::where('slug', '=', $slug)->first();

    	// return the view and pass in the post object
    	return view('blog.single')->withPost($post);
    }
}
