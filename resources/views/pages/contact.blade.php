@extends('pages.main')
@section('content')

        <div class="row" style="padding-top:120px;">
            <div class="col-lg-6 col-lg-offset-3 col-md-10 col-md-offset-2">
           	<form action="/posts" method="POST" >
             {!! csrf_field() !!}
           		<label> Email</label> <br>
           		<input name="email" type="email" class="form-control" placeholder="hoodyhoo@ovvls.com"><br>
           		<label>Feed Back</label> <br>
           		<input name="feedback" id="feedback" class="form-control" style="height:200px;" placeholder="nice awesome blog bro"></input> <br>
           		<input type="Submit" class="btn btn-danger btn-block" value="send">
           	</form>

            </div>
        </div>
    </div>

    <hr>


@endsection