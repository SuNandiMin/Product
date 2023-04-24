@extends('layouts.master')

@section('content')

{{-- @if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif --}}

@if (session('success'))
    <div class="alert alert-success alert-dismissible">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="alert-success">
    <p class="text-primary" id="message"></p>
</div>

@if(session('cart'))

<div class="row">
    <div class="col-md-8">
        <table id="cart" class="table table-hover table-condensed bg-sand text-center">

            <tr>
                <th style="width:10%">No</th>
                <th style="width:25%">Product</th>
                <th style="width:15%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:25%" class="text-center">Subtotal</th>
                <th style="width:15%">Action</th>
            </tr>
            <tbody>
                @php
                $total = 0;
                $i = 1;
                @endphp


                    @foreach(session('cart') as $id => $details)

                    @php
                    $total += $details['price'] * $details['quantity']
                    @endphp

                    <tr data-id="{{ $id }}">

                        {{-- <input type="hidden" name="id[]" value="{{ $id }}"> --}}

                        <td data-th="no">{{$i++}}</td>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="/images/{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                                <div class="col-sm-9">
                                    <h5 class="nomargin">{{ $details['name'] }}</h5>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">{{ $details['price'] }}Ks</td>
                        <td data-th="Quantity">
                                <input type="number" id="qty" step="1" min="1" max=""  name="quantity" value="{{ $details['quantity'] }}"  onchange="updateQuantity(event,{{ $id }})" class="form-control quantity update-cart" />
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">
                            {{-- <form action="{{ route('remove-cart',$id) }}" method="POST" enctype="multipart/form-data"> --}}
                                {{-- @csrf --}}
                                {{-- @method('DELETE') --}}
                                {{-- <button type="submit">Remove</button> --}}
                                <a href="{{ route('remove.cart',$id) }}">Remove</a>
                            {{-- </form> --}}
                        </td>
                    </tr>

                    @endforeach

            </tbody>

            <tfoot>
                <tr>
                    <td colspan="6" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
                </tr>
                {{-- @dd(array_keys(session('cart'))) --}}
                {{-- <tr>
                    <td colspan="10" class="text-right">
                        <a href="{{ route('cartOrder') }}">
                            <button type="submit" name="order" class="button">Order</button>
                        </a>

                    </td>
                </tr> --}}
            </tfoot>
        </table>
    </div>
    <div class="col-md-4 ">
        <div class="product-detail">
            <form action="{{ route('cartOrder') }}" enctype="multipart/form-data">
            @csrf

                @if (!auth()->user())
                    <div class="mt-3">
                        <div class="form-group">
                            <strong class="price colored text-bold" for="name">Name:</strong>
                            <input type="text" id="name" class="form-control" value=" " name="customer_name" placeholder="Address">
                            @if($errors->has('customer_name'))
                            <p>{{ $errors->first('customer_name') }}</p>
                        @endif
                        </div>
                    </div><hr>

                @endif

                <div class="mt-3">
                    <div class="form-group">
                        <strong class="price colored text-bold" for="address">Address:</strong>
                        <input type="text" id="address" class="form-control" value=" " name="address" placeholder="Address">
                        @if($errors->has('address'))
                        <p>{{ $errors->first('address') }}</p>
                        @endif
                    </div>
                </div><hr>

                <div class="mt-3">
                    <div class="form-group">
                        <strong class="price colored text-bold" for="delivery-date">Delivery Date:</strong>
                        <input type="date" id="delivery-date" class="form-control" value="{{request('start_date')}}" name="delivery_date" placeholder="Delivery Date">
                        @if($errors->has('delivery_date'))
                        <p>{{ $errors->first('delivery_date') }}</p>
                        @endif
                    </div>
                </div><hr>

                <button type="submit" class="float-end" name="order" value="27545" class="button">Order</button>
            </form>

        </div>
    </div>
</div>

@else
    <div class="bg-sand pb-5">
        <h2 class="p-5 text-center ">!!! Nothing in your cart !!!</h2>
    </div>
@endif
<script>
    function updateQuantity(event,id){
        let message= document.getElementById("message");
        let qty = event.target.value;
        let route= `{{ url('updateQty')}}?quantity=${qty}&id=${id}`;
        axios.get(route).then(res=>{
            // alert('success');
            console.log('success');
        })
        console.log(route);

        message.innerHTML = "Quantity Update Success!";
}
</script>

@endsection
@push('scripts')

@endpush
