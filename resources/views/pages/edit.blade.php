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
    		<?php $post=Session::get('post'); 
			 $categories=Session::get('Category');  ?>
    	 	<form action="/posts/{{ $post->id }}" method="POST"  data-parsley-validate>
                  {{ method_field('PUT') }} 	
                  {{ csrf_field() }}

              <div class="form form-group">
            	<label> Title</label> <br>
           		<input name="title" style="width:600px" type="title" value="{{ $post->title }}" ><br>
           		<label> Slug</label> <br>
                <input name="slug" style="width:600px" type="title" value="{{ $post->slug }}"  required maxlength="25" minlength="5"><br>
              <label>Category</label><br>
              <select   name="category_id" >
              @foreach($categories as $category)
              <option   value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
              </select><br>
             
              </select>
              <label>Body</label> <br>
           		<textarea name="body" style="width:600px; height:300px; "id="body"   >{{ $post->body }}</textarea> <br>
           		<input type="Submit" class="btn btn-info " value="Update">

              </div>         
            </form>
            <a href="{{ route('posts.show',null) }}" class="btn btn-danger">Cancel</a>
        </div>

    </div>
    {{session()->forget('post')}}
    {{session()->forget('Category')}}
@endsection