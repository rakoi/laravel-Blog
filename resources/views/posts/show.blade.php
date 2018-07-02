@extends('pages.main')
@section('content')

    <div class="row" style="padding-top:120px;">
        <div class="col-md-3 ">
            @if(Session::has('Deleted'))
             <alert class="alert alert-danger pull-">
                {{ Session::get('Deleted')}}
             </alert>
            @endif

        </div>
        <div class="col-md-7 col-md-offset-1">
             <a href="{{ route('posts.create') }}" class="btn btn-info pull-right">Create New Post</a>

            <h1>All Posts</h1>
            
        </div>
    </div>


    <div class="row">
        <div class="col col-md-11 col-md-offset-1">

            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Category</th>
                    <th>Body</th>
                    <th>Comments</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>    
                        <th> {{ $post->id }} </th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->showPost }}<a href="{{ route('posts.show',$post->id) }}">..Read More</a></td>
                        <td>{{$post->comment->count()}}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td><a href="posts/{{$post->id }}" class="btn btn-success">View</a>
                        
                        </td>
                        <td><a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary">Edit</a></td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <center> {{ $posts->links() }}</center>
        </div>
        
        </div>



@endsection

