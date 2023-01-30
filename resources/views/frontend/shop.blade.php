@extends('layouts.master')

@section('content')

<div class="site-banner">
	<div class="banner-content container colored">
        <h1>Shop</h1>
	</div>
</div><!--site-banner-->

<section class="our-team bg-sand padding-large">
	<div class="container">
		<div class="row">
            @foreach ($products as $key=>$product)
				<div class="product-item col-md-3 pb-4">
					<a href="{{ url('single-product',$product->id) }}" class="product-image">
                        <img src="/images/{{ $product->image}}">
                    </a>
					<div class="text-comtent text-center">
						<h5 class="pt-4"><a href="{{ url('single-product',$product->id) }}">{{ $product->name }}</a></h5>
						<p>{{ $product->category->category_name ?? null }}</p>
						<span class="price colored">{{ $product->price ?? null }}Ks</span>
					</div>
				</div>
            @endforeach
		</div>
	</div>
</section>

@endsection
