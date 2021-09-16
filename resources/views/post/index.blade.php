@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Thought</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('post.create') }}"> Create New Post</a>
        </div>
        <br/>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

{{$i=0}}
<table class="table table-bordered">
 <tr>
   <th width="70px">No</th>
   <th width="200px">Name</th>
   <th>Description</th>
   <th width="150px">Action</th>
 </tr>
 @foreach ($posts as $post)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $post->user->name}}</td>
    <td>{{ $post->description }}</td>
    <td>
        <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">View Post</a>
    </td>
  </tr>
 @endforeach
</table>
</div>

@endsection