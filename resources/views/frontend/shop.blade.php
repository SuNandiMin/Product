@extends('layouts.master')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<section class="our-team bg-sand padding-large">
	<div class="container" >
		<div class="row">
            @foreach ($products as $key=>$product)
                <div class="product-item col-md-3 pb-4" >

                        <a href="{{ url('single-product',$product->id) }}" class="product-image" style="height:fit-content">

                            <img src="/images/{{ $product->image}}">
                        </a>
                        <div class="text-comtent text-center">
                            <h5 class="pt-4"><a href="{{ url('single-product',$product->id) }}">{{ $product->name }}</a></h5>
                            <p>{{ $product->category->category_name ?? null }}</p>
                            <span class="price colored">{{ $product->price ?? null }}Ks</span>
                        </div>
                        <a href="{{ route('add.to.cart',$product->id) }}">
                            <button type="submit" name="add-to-cart" class="button">Add To Cart</button>
                        </a>

                </div>
            @endforeach
		 </div>
	</div>
</section>
@endsection
