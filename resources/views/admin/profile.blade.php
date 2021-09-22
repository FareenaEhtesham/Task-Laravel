@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <br/>
                    <h4>Name:
                        <span style="font-size:20px;font-weight:bold;padding-left:10px">{{Auth::user()->name}}
                        </span>
                    </h4>

                    <h4>Email:
                        <span style="font-size:20px;font-weight:bold;padding-left:10px">{{Auth::user()->email}}
                        </span>
                    </h4>

                    <blockquote class="blockquote mb-0">
                        <a href="{{route('user.index')}}"> Review All Users </a>
                    </blockquote>

                    <blockquote class="blockquote mb-0">
                        <a href="{{route('post.index')}}"> Review All Post </a>
                    </blockquote>                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
