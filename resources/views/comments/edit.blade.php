@extends('pages.main')
@section('content')

	<div class="row" style="padding-top:120px;">
  		<div class="col-md-2">

      @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
          <strong>Errors:</strong>
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>
    	<div class="col-md-9 ">
    	 
    	 	<form class="form" method="POST" action="\comments\{{$comment->id}}" parsley-form-validate>
    	 	{{  method_field('PUT') }}
    	 	{{ csrf_field()	 }}

    	 		<label>Emails</label>
    	 		<input type="email" name="email" disabled  class="form-control" value="{{ $comment->email }}">
    	 		<label>Name</label>
    	 		<input type="text" class="form-control" disabled  name="name" value="{{ $comment->name }}">
    	 		<label>Comment</label>
    	 		<textarea type="text" name="comment" required  class="form-control" >{{$comment->comment}}</textarea><br>
    	 		<input type="submit"  class= "btn btn-success btn-block" value="Update">
    	 	</form>



        </div>

    </div>
@endsection