@extends('master')
@section('content')
<div class="container py-5">
    <div class="row my-4">
        <div class="col-sm-6">
            <h2>Add Expense</h2>
            <form action="{{route('add-expense')}}" method="post">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="form-group my-4">
                    <label for="exampleInputUser1">Amount</label>
                    <input type="number" class="form-control" name="amount" id="exampleInputEmail1 "placeholder="Enter Amount" value="{{old('amount')}}">
                    <span class="text-danger">@error('amount'){{$message}}@enderror</span><br>
                </div>

                <div class="form-group my-4">
                    <label for="inputState">Category</label>
                    <select id="inputState" class="form-control" name="category" >
                        <option selected>Food</option>
                        <option>Necessities</option>
                        <option>Shopping</option>
                        <option>Travel</option>
                        <option>Entertainment</option>
                        <option>Other</option>
                    </select>
                    <span class="text-danger">@error('category'){{$message}}@enderror</span><br>
                </div>
                <button type="submit" class="btn button my-4">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection