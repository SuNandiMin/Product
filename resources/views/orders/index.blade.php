@extends('layouts.master')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Id</th>
            <th>Product Name</th>
            <th>Customer Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total_Amount</th>
            <th>Address</th>
        </tr>
        @foreach ($orders as $key=>$order)
        <tr>
            <td>{{++$key}}</td>
            <td>Ord-{{$order->id}}</td>
            <td>{{ $order->product_name }}</td>
            <td>{{ $order->customer_name}}</td>
            <td>{{ $order->price}}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{$order->total_cost}}</td>
            <td>{{ $order->address}}</td>

        </tr>
        @endforeach
    </table>
@endsection
