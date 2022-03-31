@extends('master')
@section('content')
<div class="container py-5 dash">
    <h2 class="my-4">Home Page</h2>
    <hr>
    <table class="table my-4">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Current Balance</th>
        </thead>
        <tbody>
            <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->balance}}</td>
            </tr>
        </tbody>
    </table>
    <div class="control">
    <a href="addexpense" class="btn button my-4 py-2 px-3 mx-4">Add Expense</a>
    <a href="addincome" class="btn button my-4 py-2 px-3 mx-4">Add Income</a>
    <a href="report" class="btn button my-4 py-2 px-3 mx-4">Display Report</a>
    <a href="logout" class="btn button my-4 py-2 px-3 mx-4">Logout</a>
    </div>
</div>
@endsection