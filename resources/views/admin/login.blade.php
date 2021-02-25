@extends('admin.master')
@section('content')
    <div class="container custom-login">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <h2>Login Admin</h2>
                @if($errors)
                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{$error}}</p>
                    @endforeach
                @endif
                    @if(Session::has('error'))
                        <p class="text-danger">{{session('error')}}</p>
                    @endif
                <form method="POST">
                    @csrf
                    <div class="form-group">   
                        <label>Email Address</label>
                        <input type="text" name="username" class="form-control" placeholder="Taper votre Email Address">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Taper votre password">
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Login" />
                </form>
            </div>
        </div>
    </div>
@endsection