@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Post/Thoughts</h2>
        </div>
        @if(Auth::user()->role == "User")
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('post.create') }}"> Create New Post</a>
        </div>
        @endif
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
    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
        <a href="{{ route('post.show', $post->id) }}">
          <i class="fas fa-eye"></i>
        </a>
        @if(Auth::user()->role == "Admin")
          
            @csrf
            @method('DELETE')

              <button type="submit" title="delete" style="border: none; background-color:transparent; outline: none;" onclick="return confirm('Are you sure you want to delete this?')">
                  <i class="fas fa-trash text-danger"></i>
              </button>
          </form>
        @endif
      </td>
  </tr>
 @endforeach
</table>
</div>

@endsection