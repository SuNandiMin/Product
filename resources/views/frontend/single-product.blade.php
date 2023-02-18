@extends('layouts.master')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<section class="bg-sand padding-large">
	<div class="container">
		<div class="row">

			<div class="col-md-3">
				<a href="#" class="product-image"><img src="/images/{{ $product->image}}"></a>
                <br>
                <a href="{{ route('add.to.cart',$product->id) }}">
                    <button type="submit" name="add-to-cart" class="button">Add To Cart</button>
                </a>
            </div>

            <div class="col-md-3">
                <div class="">
                    <div class="form-group">
                        <h5 class="pt-4"><a  href="#">{{ $product->name }}</a></h5>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="form-group ">
                        <strong  class=" price colored text-bold" for="category">Category:</strong>
                        <p id="category" >{{ $product->category->category_name }}</p>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="form-group">
                        <strong  class=" price colored text-bold" for="price">Price:</strong>
                        <span id="price" >{{ $product->price }}</span>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="form-group">
                        <strong  class="price colored text-bold" for="detail">Detail:</strong>
                        <p id="detail" >
                            {{$product->detail}}
                        </p>
                    </div>
                </div>
            </div>

			<div class="col-md-6 ">
				<div class="product-detail">
                    <form action="{{ url('orders',$product->id) }}" method="POST" enctype="multipart/form-data">
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

                        <input type="number" id="qty" class="input-text qty text form-control" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric">
                        @if($errors->has('quantity'))
                        <p>{{ $errors->first('quantity') }}</p>
                        @endif
                        <button type="submit" name="order" value="27545" class="button">Order</button>
                    </form>

				</div>
			</div>

		</div>
	</div>
</section>

@endsection
