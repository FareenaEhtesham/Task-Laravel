@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
  <div class="card-header">
    {{ $post->user->name }} thought
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p> {{ $post->description }}</p>
      <footer class="blockquote-footer">post by <cite title="Source Title">{{$post->user->name}}</cite></footer>
    </blockquote>
  </div>
</div>
</div>

@endsection