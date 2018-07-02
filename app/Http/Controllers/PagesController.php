<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
class PagesController extends Controller
{
    public function getIndex(){
        $posts=Post::OrderBy('id','desc')->paginate(6);
        $Categories=Category::all();

    	return view('pages.index')->withposts($posts)->withcategories($Categories);
    }
     public function getContact(){
    	return view('pages.contact');
    }
    public function getPage(){
        $Category=Category::all();
        $tags=Tag::all();
        return view('pages.page')->withcategories($Category)->withtags($tags);
    }
    public function getAbout(){
    	return view('pages.about');
    }
 
   public function getPosted(){
        return view('pages.post');
    }

    public function getEdit(){
        //$post=Post::find($id);
        //$Category=Category::all();
        //return view('pages.edit')->withPost($post)->withcategories($Category);
       
        return view('pages.edit');
    }

    
}

