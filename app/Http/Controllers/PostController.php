<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Category;
use Session;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */

      public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
      
        $posts=Post::OrderBy('id','desc')->paginate(10);
        $tags=Tag::all();
        return view('posts.show')->withposts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

            //$Category=Category::all();
            //$tags=Tag::all();
            return redirect()->route('create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $this->validate($request,array('title'=>'required |max:255',
                                        'body'=>'required',
                                        /*'slug'=>'required|min:5|max:255|unique:posts,slug'*/
                                        ));
        $post=new Post;

        $post->title=$request->title;
        $post->category_id=$request->category_id;
        $post->slug=$request->slug;
        $post->body=$request->body;

        if ($request->hasFile('FeaturedImage')) {
            $image=$request->file('FeaturedImage');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/').$filename;
            
            Image::make($image)->resize(800,400)->save($location);
             
            $post->FeaturedImage=$filename;
        }
        

        Session::flash('Success','Article Published');

        $post->save();
        return redirect()->route('posts.show',$post->id);
      
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('pages.post')->withPost($post);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        $Category=Category::all();
        Session::put('post',$post);
        Session::put('Category',$Category);
        //session::put('key',$value);
        //session::get('variable name');
      return redirect()->route('edit');
        //session()->get('key');
        //session()->put('key'=>'value');
        //session() ->pull('key')
       //return redirect()->route('edit',$post);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         
   
       //|unique:posts,slug
        $this->validate($request,array('title'=>'required | max:255',
                        'slug'=>'required|min:5|max:25 ',
                        'category_id'=>'required|integer',
                        'body'=>'required'
                        ));
        $post=Post::findorFail($id);

        $post->title=$request->input('title');
        $post->category_id=$request->input('category_id');
        $post->slug=$request->input('slug');
        $post->body=$request->input('body');
       
        $post->save();

        Session::flash('updated','Post successfully Updated');
        
        return redirect()->route('posts.show',$post->id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findorFail($id);
        $post->delete();
       Session::flash('Deleted','Deleted Success');

       return redirect()->route('posts.index');
    }
}
