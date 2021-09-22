@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Post</h2>
        </div>
    </div>
</div>
<form method="post" action="{{route('post.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4 col-lg-12">
                                    <div class="form-group">
                                        <label class="floating-label" for="description">Description</label>
                                        <p>What are your thoughts about Software Engineering? </p>
                                        <input type="text" class="form-control" id="description" name="description" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group" style="float: right;">
                                        <button type="submit" class="btn btn-success">Save</button>
                                        &nbsp;
                                        <a class="btn btn-success" href="{{url('/post')}}">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
</div>

@endsection