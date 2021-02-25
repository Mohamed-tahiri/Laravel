@extends('admin.master')
@section('content')
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Edit Post </h2>
            </div>
    
            <div class="pull-right">
                <a class="btn btn-success" href="../dashboard">Dashboard</a>
            </div>
        </div>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Title Post</strong>
                    <input type="text" name="title" class="form-control" value="{{ $post->title}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description</strong>
                    <textarea class="form-control" name="description"  style="height: 150px">{{ $post->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Post Image:</strong>
                    <input type="file" name="logo" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Post Old Image:</strong>
                    <img src="{{ URL::to($post->logo) }}" height="70px" width="80px">
                    <input type="hidden" name="old_logo" value="{{ $post->logo }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="submit" class="btn btn-primary" value="Add the post">
            </div>
        </div>
    </form>    

@endsection