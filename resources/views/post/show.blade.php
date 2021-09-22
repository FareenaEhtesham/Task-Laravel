@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

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
  <br/><br/>

  <!-- Comments Section -->
  <!-- Display Comments -->
  <h4 style="color:blue">Comments</h4>

    @foreach($post->comments as $comment)
        <strong>{{ $comment->user->name }}: </strong>
        <span>{{ $comment->comment }}</span>  
        <br/>      
        <footer class="blockquote-footer" style="padding-left:5px">
          <cite title="Source Title">{{$comment->created_at}}</cite>
        </footer>
        <br/>
        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
        @if(Auth::user()->role_id == 1)
          
            @csrf
            @method('DELETE')

              <button type="submit" title="delete" style="border: none; background-color:transparent; outline: none;" onclick="return confirm('Are you sure you want to delete this?')">
                  <i class="fas fa-trash text-danger"></i>
              </button>
          </form>
        @endif
    @endforeach
    
    <hr />

    <!-- Add Comments -->
    <h4 style="color:blue">Add comment</h4>
      <form method="post" action="{{ route('comments.store') }}">
      @csrf
          <div class="form-group">
              <textarea class="form-control" name="comment" required></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}" />
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success" value="Add Comment" />
          </div>
      </form>
  </div>
</div>
</div>

@endsection