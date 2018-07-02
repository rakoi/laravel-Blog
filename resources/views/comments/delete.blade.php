@extends('pages.main')
@section('content')
        <div class="row" style="padding-top:120px;">

                <div class="row">
                   <div class="col-md-6 col-md-offset-3">
      <form action="{{route('comments.destroy',$comment->id)}}">
        {{ ($comment->comment)}}
        <input type="submit" class="btn btn-danger btn-block "  value="Delete" >
      </form>
                  
                   </form>
                   
                   </div>
            </div>
@endsection