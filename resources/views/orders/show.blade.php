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
            <th>Order Id</th>
            <th>Product Id</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Cost</th>
        </tr>
        {{-- @php
            $cost = 0;
        @endphp --}}
        @foreach ($order_items as $key=>$item)
            {{-- @php
                $cost += $item->price * $item->quantity
            @endphp --}}
            <tr>
                <td>{{++$key}}</td>
                <td>{{$item->id}}</td>
                <td>{{ $item->order_id }}</td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->price}}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price * $item->quantity}}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="7" class="text-end">
                <h5>Total Cost</h5>
                <h4>{{ $total_cost }}</h4>
            </td>

        </tr>
    </table>
@endsection
