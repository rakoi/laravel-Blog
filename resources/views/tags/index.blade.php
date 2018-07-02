@extends('pages.main')
@section('content')

        <div class="row" style="padding-top:120px;">

        	<div class="col-lg-2 col-md-2">
        		@if(Session::has('Success'))
        		<div class="alert alert-success">{{ Session::get('Success') }}</div>
        		@endif

        		@if(count($errors)>0)
        		@foreach($errors->all() as $error)
        		<div class="alert alert-danger">
        			<li>{{ $error }}</li>
        		</div>
        		@endforeach
        		@endif
        	 </div>
            <div class="col-lg-6  col-md-6 ">
      		<h1>Tags</h1>
	      		<table class="table">
	      			<thead>
	      			<th>#</th>
	      			<th>Tag</th>
	      			</thead>
	      			@forelse($tags as $tag)
	      			<tbody>
	      			<td>{{ $tag->id }}</td>
	      			<td>{{ $tag->name }}</td>
	      			@empty
	      			<td>No Tags</td>
	      			</tbody>
	      			

	      			@endforelse
	      		</table>
	      		
			</div>
	        
	        <div class="col-md-4 col-lg-4">
	        	<div class="well">
	        	<form action="{{ route('tags.store') }}" class="form" method="POST">
	        		{{ csrf_field()}}
	        		
	        	<label>Enter Tag</label><br>
	        	<input name="name" type="text"><br> <br>
	        	<input type="submit" class="btn btn-info " value="Create New Category">
	        	</form>
	        	</div>
	        </div>
    	</div>

    <hr>


@endsection