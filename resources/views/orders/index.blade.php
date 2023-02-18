@extends('layouts.app')

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
            <th>Customer Name</th>
            <th>Total_Amount</th>
            <th>Address</th>
            <th>Ordered Date</th>
            <th>Delivery Date</th>
            <th>Action</th>
        </tr>
        @foreach ($orders as $key=>$order)
        <tr>
            <td>{{++$key}}</td>
            <td>Ord-{{$order->id}}</td>
            <td>{{ $order->customer_name}}</td>
            <td>{{$order->total_cost}}</td>
            <td>{{ $order->address}}</td>
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->delivery_date }}</td>
            <td>
                <form action="{{ url('orders',$order->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ url('order-items',$order->id) }}">Show</a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="8" class="text-end">
                <Strong>
                    Total
                </Strong>
                <h3>
                    {{ $total }}
                </h3>
            </td>
        </tr>
    </table>
@endsection
