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
            <div class="col-md-6 ">
              <h1>New Post</h1>
           	<form action="/posts" enctype="multipart/form-data" method="POST"   data-parsley-validate>
                  {{ csrf_field() }}
              <div class="form form-group">
            	<label> Title</label> <br>
           		<input name="title" style="width:600px" type="title"  required maxlength="255"><br>
           		 <label> Slug</label> <br>
              <input name="slug" style="width:550px" type="text"  required minlength:"5" maxlength="25"><br>
              <label>Category</label><br>
              <select name="category_id">
              @foreach($categories as $category) 
              <option value="{{ $category->id }}" >{{ $category->name}}</option>
              @endforeach
              </select ><br>
              <label>Tags</label><br>
              <select class="form-control select2" multiple="multiple" >
              @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
              @endforeach
              </select><br>
              
             <label>Featured Image</label><br>
             <input type="file" name="FeaturedImage">
              <label>Body</label> <br>
           		<textarea name="body" style="width:600px; height:300px; "id="body" required></textarea> <br>
           		<input type="Submit" class="btn btn-danger " value="Post">
              </div>         
            	</form>

            </div>
        </div>
    </div>

    <hr>


@endsection