@extends('master')
@section('content')
<div class="container py-5">
    <div class="row py-4">
        <div class="col-md-4 col-md-offset-4">
        <h3>Login</h3>
            <form action="{{route('login-user')}}" method="post">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="form-group my-4">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{old('email')}}" aria-describedby="emailHelp" placeholder="Enter email">
                    <span class="text-danger">@error('email'){{$message}}@enderror</span><br>
                </div>
                <div class="form-group my-4">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" value="{{old('password')}}" placeholder="Password">
                    <span class="text-danger">@error('password'){{$message}}@enderror</span><br>
                </div>
                <button type="submit" class="btn button my-4">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection