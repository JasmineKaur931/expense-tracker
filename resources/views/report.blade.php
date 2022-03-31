@extends('master')
@section('content')
<div class="container report my-4">
<h2 class="my-4">Report</h2>
    <table class="table my-4">
        <thead>
            <th>Category</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Date</th>
        </thead>
        <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{$row->category}}</td>
                <td>{{$row->type}}</td>
                <td>{{$row->amount}}</td>
                <td>{{$row->created_at}}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection