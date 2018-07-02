<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Post;
use Session;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$post_id)
    {
        $this->validate($request,array (
                        'name'=>'required|max:25',
                        'email'=>'required|email',
                        'comment'=>'required|max:255')
            );

        $comment=new Comment();
        $post=Post::find($post_id);
        $comment->name=$request->name;
        $comment->email=$request->email;
        $comment->comment=$request->comment;
        $comment->approved=true;

        $comment->post()->associate($post);


        $comment->save();
      
      return view('blog.single')->withposts($post); 

      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $comments=Comment::find($id);
        return view('comments.edit')->withComment($comments);
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
            $this->validate($request,array(
                'comment'=>'required'
                ));

            $allcomments=new Comment;
            $comment=Comment::find($id);

            $comment->comment=$request->comment;
            $comment->save();

            return redirect()->route('posts.show',$comment->post->id);
    }

    public function delete($id){

        $comment=Comment::find($id);

        return view('comments.delete')->withComment($comment);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $Comment=Comment::find($id);
        $post_id=$Comment->post->id;
        $Comment->delete();
        $post=Post::find($post_id);
        
       return view('pages.post')->withPost($post);
    }
}
