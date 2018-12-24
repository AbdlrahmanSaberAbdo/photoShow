@extends('layouts.master')
@section('title', 'home')

@section('content')

    @if(count($albums) > 0)
      <?php
        $colcount = count($albums);
        $i = 1;
      ?>
      <div class="row">
      @foreach($albums as $album)
        <div class="col-md-4" style="margin-top:60px">
          <a href="{{route('albums.show',[$album->id])}}"><img class="img-fluid img-thumbnail" style="height:300px; min-width:350px;" src="storage/album_covers/{{$album->cover}}" alt="{{$album->name}}"> </a>
          <h2 class="text-center">{{$album->name}}</h2>
        </div>
        @if($i % 3 == 0)
        </div><div class="row"></div>
        @endif
        <?php $i++; ?>
      @endforeach
    @endif
@endsection
