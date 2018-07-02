<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class BlogController extends Controller
{	
	 public function index(){
    	
    	$posts=Post::OrderBy('id','desc')->paginate(10);
    	return view('blog.index')->withposts($posts);

    }
    public function getSingle($slug){
    	$posts=Post::where('slug','=',$slug)->first();
    	//	return $posts;
    	return view('blog.single')->withposts($posts); 
    }

}
