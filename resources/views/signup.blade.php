@extends('master')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-sm-6">
            <h3>Signup</h3>
            <form action="{{route('signup-user')}}" method="post">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
            <div class="form-group my-4">
                <label for="exampleInputUser1">Username</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1"placeholder="Enter username" value="{{old('name')}}">
                <span class="text-danger">@error('name'){{$message}}@enderror</span><br>
            </div>
            <div class="form-group my-4">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email" value="{{old('email')}}">
                <span class="text-danger">@error('email'){{$message}}@enderror</span><br>
            </div>
            <div class="form-group my-4">
                <label for="exampleInputUser1">Balance</label>
                <input type="number" class="form-control" name="balance" id="exampleInputEmail1"placeholder="Enter Balance" value="{{old('balance')}}">
                <span class="text-danger">@error('balance'){{$message}}@enderror</span><br>
            </div>
            <div class="form-group my-4">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" value="{{old('password')}}">
                <span class="text-danger">@error('password'){{$message}}@enderror</span><br>
            </div>
            <button type="submit" class="btn button my-4">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection