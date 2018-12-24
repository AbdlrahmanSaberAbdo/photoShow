@extends('layouts.master')
@section('title', 'home')

@section('content')
  <div class="container">
    <h1>Create Album</h1>
    <form method="POST" action="{{route('albums.store')}}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" rows="6" cols="80" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label for="cover">Cover</label>
        <input type="file" name="cover" class="form-control">
      </div>
      <button type="submit" class="btn btn-success" name="button">Create</button>
    </form>
  </div>
@endsection
