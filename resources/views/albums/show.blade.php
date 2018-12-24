@extends('layouts.master')
@section('title', 'photos')

@section('content')
<div class="album" style="margin:60px 0;">


  <h1>{{$album->name}}</h1>

  <a class="btn btn-success" href="{{route('albums.index')}}">Go Back</a>
  <a href="{{URL::to('photos/create/'.$album->id)}}" class="btn btn-info">Upload photo to album</a>
  <form style="margin-top:30px; float:right;" onsubmit="return confirm('Are you sure you want to submit?')" action="{{URL::to('albums/'.$album->id)}}" method="POST">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input style="padding:5px 28px;" class="btn btn-danger" type="submit" value="Delete Album">
  </form>
  @if(count($photos) > 0)
  <div class="row">
    @foreach($photos as $photo)
    <div class="col-md-4" style="margin-top:60px">
      <div class="ed_del">

      </div>
      <a href="{{URL::to('/photos/'.$photo->id.'/'.$album->id)}}">
        <img class="thumbnail" style="height:300px; max-width:100%;" src="{{URL::to('/storage/photos/'.$album->id.'/'.$photo->photo)}}" alt="{{$photo->title}}">
      </a>
      <h4 style="margin-top:20px;">{{$photo->title}}</h4>
    </div>
    @endforeach
  </div>
  @endif

</div>
@endsection
