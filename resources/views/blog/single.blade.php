@extends('pages.main')
@section('content')
        <div class="row" style="padding-top:120px;">
           <div class="col-md-3">
                @if(count($errors)>0)
                <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                  <ul>
                    <li>{{ $error}}</li>
                  </ul>
                  @endforeach
                </div>
                @endif

            </div>
        <div class="col-md-8  col-md-offset-2  "> 
          
            <div class="panel">
                <div class="panel-header"><h2>{{ $posts->title }} <h2></div>
                <img src="{{asset('images/'.$posts->FeaturedImage)}}">
                <br>
                <div class="panel-body"> {{ strip_tags($posts->body) }}<br>
                    <small style="color:gray" class="pull-left"> 
             
                         </small>
                </div>
            </div>
        
        </div>


        <div class="col-md-8  col-md-offset-2  "> 
        <div class="Panel"> <i class="glyphicon glyphicon-comment"> </i> {{$posts->comment->count() }} Comments</div>
            @foreach($posts->comment as $comment)
           <div class=" well comments">
           <img src="http://localhost/asilia/wp-content/uploads/2016/03/Website-Banner-07-1200x410.png" class="author-image">
               <div class="author-name"><h3> {{ $comment->name }}<br>
                    <small>  {{$comment->created_at->diffForHumans()}}</small>
               </div>
                {{ $comment->comment}}
              

           </div>
          
            @endforeach
        </div>
    
       





        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form data-parsley-validate class="comments" method="POST"  action="/comments/{{$posts->id}}">
                {!! csrf_field() !!}
                <div class="col-md-6">
                <label>Email</label>
                <input type="email" required name="email" class="form-control"> </div>
                     <div class="col-md-6">
                <label>Name</label>
                <input type="text" name="name" required class="form-control"> </div>
                     <div class="col-md-12">
                <label>Comment</label>
                <textarea name="comment" class="form-control" required></textarea><br>
                <input type="submit" value="comment" class=" form-control btn btn-info"><br><br>

                </form>
            </div>

        </div>


@endsection