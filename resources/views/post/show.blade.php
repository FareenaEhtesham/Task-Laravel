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
  <br/><br/>

  <!-- Comments Section -->
  <!-- Display Comments -->
  <h4 style="color:blue">Comments</h4>

    @foreach($post->comments as $comment)
        <strong>{{ $comment->user->name }}: </strong>
        <span>{{ $comment->comment }}</span>  
        <br/>      
        <footer class="blockquote-footer" style="padding-left:5px">
          <cite title="Source Title">{{$comment->created_at}}</cite>\
        </footer>
        <br/>
    @endforeach
    
    <hr />

    <!-- Add Comments -->
    <h4 style="color:blue">Add comment</h4>
      <form method="post" action="{{ route('comments.store') }}">
      @csrf
          <div class="form-group">
              <textarea class="form-control" name="comment"></textarea>
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