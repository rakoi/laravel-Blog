@extends('pages.main')
@section('content')
        <div class="row" style="padding-top:120px;">
                <div class="col col-md-2">
                    @if(Session::has('updated'))
                    <div class="alert alert-success">
                          {{ Session::get('updated') }}
                    </div>    
                    @endif 
                    @if(Session::has('Success'))
                    <div class="alert alert-success">
                          {{ Session::get('Success') }}
                    </div>    
                    @endif      
                </div>
                <div class="col col-md-6 ">

                    <h3 class="pull-left">{{  $post->title}} </h3>  <hr><br> 
                    <img src="{{asset('images/'.$post->FeaturedImage)}}">
                    <div class="lead">
                        {{ strip_tags($post->body) }}<br>
                        <small class="pull-right">{{ $post->created_at->diffForHumans() }}</small>
                    </div>
                </div>

                <div class="col col-md-4">
                    <div class="well">
                        Created at :{{ $post->created_at }} <br><hr>
                        Slug : <a  href="/blog/{{($post->slug) }}">{{ url($post->slug) }}</a>  <br><hr>
                        Posted In :{{ $post->category->name }}  <br><hr>
                        Updated at :{{ $post->updated_at }}  <br><hr>
                         <a href="/posts/{{ $post->id }}/edit" class="btn  btn-block btn-info">Edit</a>  <br>
                        <form method="POST" action="/posts/{{$post->id}}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                               <input type="submit" class="btn btn-danger btn-block" value="delete">
                        </form>
                        <br>
                        <a href="\posts" class="btn btn-default btn-block"> << See All Posts</a>
                    </div>


                </div>

           



    </div>
                <div class="row">
                   <div class="col-md-8 col-md-offset-2">

                   <h1>Comments ({{$post->comment->count()}})</h1>
                  
                    <table class="table">
                      <thead>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Comment</td>
                      </thead>
                        <tbody>
                        @foreach($post->comment as $comment)
                        <tr>
                           <td>{{$comment->name}}</td>
                           <td>{{$comment->email}}</td>
                           <td>{{$comment->comment}}</td>
                           <td><a href="{{route('comments.edit',$comment->id)}}" class="btn btn-info"><i class="glyphicon glyphicon-pencil">Edit</i> </td></a>
                           <td><a href="{{ route('comments.delete',$comment->id) }}" class="btn btn-danger"><i class="glyphicon glyphicon-bin">Deletes</i> </td></a>
                        </tbody>
                        </tr>
                         @endforeach
                    </table>
                   
                   </div>
            </div>
@endsection