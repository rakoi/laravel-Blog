@extends('pages.main')
@section('content')
        <div class="row" style="padding-top:120px;">
      		<div class="col-md-6 col-md-offset-2">
     		
     			@foreach($posts as $post)
     			<div class="panel panel-default" style="padding-top:20px; padding-left:20px;">
     				<div class="panel-header"> <h4>{{ $post->title }} </h4></div>
     				<div class="panel-body">
     					<p> {{ $post->showPost}}
                         </p><br>
                         <small class="pull-right">{{ $post->created_at->diffForHumans()  }}</small><br>
                         <a href="/blog/{{$post->slug}}" class="btn btn-default">Read More</a>
                        <hr>
     				</div>
     			</div>
     			@endforeach
     			{{ $posts->links() }}
     		</div>

      	</div>
          

@endsection