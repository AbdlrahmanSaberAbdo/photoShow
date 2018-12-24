@extends('layouts.master')
@section('title', 'home')

@section('content')
  <div class="container">
    <h1>Upload photo</h1>
    <form method="POST" action="{{URL::to('photos/store/'.$album_id)}}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="name">title</label>
        <input type="text" name="title" class="form-control">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description_photo" rows="6" cols="80" class="form-control"></textarea>
      </div>
      <input type="hidden" name="album_id" value="{{$album_id}}">
      <div class="form-group">
        <label for="cover">Photo</label>
        <input type="file" name="photo" class="form-control">
      </div>
      <input type="hidden" name="album_id" value="{{$album_id}}">
      <button type="submit" class="btn btn-success" name="button">Create</button>
    </form>
  </div>
@endsection
