@extends('layouts.master')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible">
    <p>{{ $message }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<section class="our-team bg-sand p-3">
	<div class="container " >
		<div class="row">
            @foreach ($products as $key=>$product)
            <div class="card col-3 offset-1 mb-5"  style="width: 20rem;">
                <div class="card-body">
                    <a href="{{ url('single-product',$product->id) }}">
                        <img class="card-image-top" style="width: 14rem; height: 14rem ;" src="/images/{{ $product->image}}">
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ url('single-product',$product->id) }}">{{ $product->name }}</a></h5>
                    <p class="card-text">{{ $product->category->category_name ?? null }}</p>
                    <p class="card-text"><span class="price colored">{{ $product->price ?? null }}Ks</span></p>
                    <div class="card-footer d-flex justify-content-evenly">
                        <a href="{{ route('add.to.cart',$product->id) }}" class="btn btn-success">Add <i class="icon icon-shopping-cart"></i></a>
                        <a href="{{ url('single-product',$product->id) }}" class="btn btn-warning">Detail</a>
                    </div>
                </div>
            </div>

            @endforeach
		 </div>
	</div>
</section>
@endsection
