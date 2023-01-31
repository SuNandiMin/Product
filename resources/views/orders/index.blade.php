@extends('layouts.master')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">

    <h1>Hello!!!!!!!</h1>
        <tr>
            <th>No</th>
            <th>Id</th>
            <th>Customer Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total_Amount</th>
            <th>Address</th>
        </tr>
        @foreach ($orders as $key=>$order)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$order->id}}</td>
            <td>{{ $order->name}}</td>
            <td>{{ $order->price}}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{$order->total_cost}}</td>
            <td>{{ $order->address}}</td>

        </tr>
        @endforeach
    </table>
@endsection
