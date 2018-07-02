@extends('pages.main')

@section('content')
    <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>My Web</h1>
                        <hr class="small">
                        <span class="subheading">Number one Tech Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="row">
        <div class="col-md-6 col-md-offset-2">
                <div class="panel">
             
            @foreach($posts as $post)
                <div class="panel-header"> <h4> {{ $post->title }}</h4> </div>
                    <div class="panel-body">
                        <p> {{ $post->showPost}}

                         </p><br>
                         <a href="blog/{{$post->slug }}"class="btn btn-info"> Read More</a>
                        <hr>
                    </div>
                      @endforeach
                      {{ $posts->links() }}
                </div> 
          
        </div>

        <div class="col-md-3">
           
            <div class="list-group">
                <ul>
                @foreach($categories as $category)
                <li class="list-group-item"><a href="/category/{{$category->id}}"> {{ $category->name }}</a></li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
 @endsection