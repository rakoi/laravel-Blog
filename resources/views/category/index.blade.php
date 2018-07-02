@extends('pages.main')
@section('content')

        <div class="row" style="padding-top:120px;">
        	<div class="col-lg-2 col-md-2">
        		@if(Session::has('Success'))
        		<alert class="alert alert-success">{{ Session::get('Success') }}</alert>
        		@endif
        	 </div>
            <div class="col-lg-6  col-md-6 ">
      		
	      		<table class="table">
	      			<thead>
	      			<th>#</th>
	      			<th>Category</th>
	      			</thead>
	      			@foreach($categories as $category)
	      			<tbody>	
	      			<td>{{ $category->id }}</td>
	      			<td>{{ $category->name }}</td>
	      			@endforeach
	      			</tbody>
	      		</table>
			</div>
	        
	        <div class="col-md-4 col-lg-4">
	        	<div class="well">
	        	<form action="{{ route('category.store') }}" class="form" method="POST">
	        		{{ csrf_field()}}
	        		
	        	<label>Enter Category</label><br>
	        	<input name="name" type="text"><br> <br>
	        	<input type="submit" class="btn btn-info " value="Create New Category">
	        	</form>
	        	</div>
	        </div>
    	</div>

    <hr>


@endsection