@extends('layouts.master')
@section('content')
  <section class="photDelete" style="margin-top:60px;">
    <div class="button" style="margin-bottom:30px;">


    </div>

    <div class="row">
      <div class="col-md-12">
        <img style="height:300px; min-width:350px" src="{{URL::to('/storage/photos/'.$album_id.'/'.$photo->photo)}}" alt="{{$photo->title}}" alt="">
        <form style="margin-top:30px" onsubmit="return confirm('Are you sure you want to submit?')" action="{{URL::to('photos/'.$photo->id.'/'.$album_id)}}" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input style="padding:5px 28px;" class="btn btn-danger" type="submit" value="Delete">
        </form>
        <a style="float:right;" class="btn btn-success" href="{{URL::to('albums/'.$album_id)}}">Go Back</a>
      </div>
    </div>
  </section>

@endsection
