@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Information</h2>
        </div>
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
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Action</th>
 </tr>
 @foreach ($users as $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name}}</td>
    <td>{{ $user->email }}</td>
    <td>
    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
        @if(Auth::user()->role_id == 1)
          
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