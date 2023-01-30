@extends('layouts.master')

@section('content')

<div class="site-banner">
	<div class="banner-content container colored">
        <h1>Blog</h1>
	</div>
</div><!--site-banner-->

<section class="post-grid margin-large border-bottom">
	<div class="container">
		<div class="row">

			<div class="col-md-4 mb-5">
				<a href="single-post.html">
					<img src="images/blog-cake.jpg" alt="blog" class="postImg mb-3">
				</a>
				<div class="content">
					<div class="meta-tags flex-container color-secondary mb-3">
						<span class="border-right"><i class="icon icon-calendar mr-2"></i>April 21,18</span>
						<span class="border-right"><i class="icon icon-bubble mr-2"></i>0 Comments</span>
						<span><i class="icon icon-envelope-o mr-2"></i>News</span>
					</div><!--meta-tags-->

					<h2 class="post-title"><a href="single-post.html">How to Make a Cake with Great Delicious Chocolate</a></h2>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eisusmod tempor incidunt ut elit et.</p>

					<div class="pix_btn">
						<a href="single-post.html" class="btn-hvr-effects mt-3">read more</a>
					</div>

				</div><!--content-->
			</div><!--col-md-4-->

		</div>
	</div>
</section>

@endsection
