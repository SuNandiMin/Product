@extends('layouts.master')

@section('content')

<div class="site-banner">
	<div class="banner-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="colored">
						<h1>Shop</h1>
						<div class="breadcum-items">
							<span class="item"><a href="index.html">Home /</a></span>
							<span class="item colored">Shop</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!--site-banner-->

<section class="bg-sand padding-large">
	<div class="container">
		<div class="row">

			<div class="col-md-6">
				<a href="#" class="product-image"><img src="/images/{{ $product->image}}"></a>
			</div>

			<div class="col-md-6 pl-5">
				<div class="product-detail">
                    <form action="" method="POST">

                        <div class="mt-3">
                            <div class="form-group">
                                <h5 class="pt-4"><a  href="#">{{ $product->name }}</a></h5>
                            </div>
                        </div><hr>

                        <div class="mt-3">
                            <div class="form-group">
                                <label  class=" price colored" for="category">Category:</label>
                                <p id="category" >{{ $product->category->category_name }}</p>
                            </div>
                        </div><hr>

                        <div class="mt-3">
                            <div class="form-group">
                                <label  class=" price colored" for="price">Price:</label>
                                <span id="price" >{{ $product->price }}</span>
                            </div>
                        </div><hr>

                        <div class="mt-3">
                            <div class="form-group">
                                <label  class="price colored" for="detail">Detail:</label>
                                <p id="detail" >
                                    {{$product->detail}}
                                </p>
                            </div>
                        </div><hr>

                        <div class="mt-3">
                            <div class="form-group">
                                <label class="price colored" for="delivery-date">Delivery Date:</label>
                                <input type="date" id="delivery-date" class="form-control" value="{{request('start_date')}}" name="delivery-date" placeholder="Delivery Date">
                            </div>
                        </div><hr>

                        <input type="number" id="qty" class="input-text qty text form-control" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric">
                        <button type="submit" name="add-to-cart"  value="27545" class="button">Add to cart</button>
                    </form>
				</div>
			</div>

		</div>
	</div>
</section>

@endsection
