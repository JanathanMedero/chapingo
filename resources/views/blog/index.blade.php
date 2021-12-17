@extends('layouts.template')

@section('head')
Chapingo - Blog
@endsection

@section('content')
<body>
	<!--================ Start Header Menu Area =================-->
	<x-header></x-header>
	<!--================ End Header Menu Area =================-->



	<!--================ Start Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="banner_inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="banner_content text-center">
							<p class="text-uppercase">
								Best online education service In the world
							</p>
							<h2 class="text-uppercase mt-4 mb-5">
								One Step Ahead This Season
							</h2>
							<div>
								<a href="#" class="primary-btn2 mb-3 mb-sm-0">learn more</a>
								<a href="#" class="primary-btn ml-sm-3 ml-0">see course</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Home Banner Area =================-->

	<!--================Blog Area =================-->
	<section class="blog_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="blog_left_sidebar">

						@foreach($notices as $notice)
						<article class="row blog_item">
							<div class="col-md-3">
								<div class="blog_info text-right">
									{{-- <div class="post_tag">
										<a href="#">Food,</a>
										<a class="active" href="#">Technology,</a>
										<a href="#">Politics,</a>
										<a href="#">Lifestyle</a>
									</div> --}}
									<ul class="blog_meta list">
										<li><a href="#">Redactor: {{ $notice->user->name }}<i class="ti-user"></i></a></li>
										<li><a href="#">
											{{ $notice->created_at->format('j F Y') }}
										<i class="ti-calendar"></i></a></li>
										{{-- <li><a href="#">1.2M Views<i class="ti-eye"></i></a></li>
										<li><a href="#">06 Comments<i class="ti-comment"></i></a></li> --}}
									</ul>
								</div>
							</div>
							<div class="col-md-9">
								<div class="blog_post">
									<a href="{{ route('blog.show', $notice->slug) }}">
										<img src="{{ asset('imagenes/noticias/'.$notice->image) }}" alt="">
									</a>
									<div class="blog_details">
										<a href="{{ route('blog.show', $notice->slug) }}">
											<h2>{{ $notice->title }}</h2>
										</a>
										<p>{{ $notice->subtitle }}</p>
										<a href="{{ route('blog.show', $notice->slug) }}" class="blog_btn">Leer más</a>
									</div>
								</div>
							</div>
						</article>
						@endforeach

						<nav class="blog-pagination justify-content-center d-flex">
							<ul class="pagination">
								<li class="page-item">
									<a href="#" class="page-link" aria-label="Previous">
										<span aria-hidden="true">
											<i class="ti-angle-left"></i>
										</span>
									</a>
								</li>
								<li class="page-item"><a href="#" class="page-link">01</a></li>
								<li class="page-item active"><a href="#" class="page-link">02</a></li>
								<li class="page-item"><a href="#" class="page-link">03</a></li>
								<li class="page-item"><a href="#" class="page-link">04</a></li>
								<li class="page-item"><a href="#" class="page-link">09</a></li>
								<li class="page-item">
									<a href="#" class="page-link" aria-label="Next">
										<span aria-hidden="true">
											<i class="ti-angle-right"></i>
										</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="blog_right_sidebar">
						<aside class="single_sidebar_widget search_widget">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search Posts">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button"><i class="ti-search"></i></button>
								</span>
							</div><!-- /input-group -->
							<div class="br"></div>
						</aside>
						<aside class="single_sidebar_widget author_widget">
							<img class="author_img rounded-circle" src="img/blog/author.png" alt="">
							<h4>Charlie Barber</h4>
							<p>Senior blog writer</p>
							<div class="social_icon">
								<a href="#"><i class="ti-facebook"></i></a>
								<a href="#"><i class="ti-twitter"></i></a>
								<a href="#"><i class="ti-github"></i></a>
								<a href="#"><i class="ti-linkedin"></i></a>
							</div>
							<p>Boot camps have its supporters andit sdetractors. Some people do not understand why you
								should have to spend money on boot camp when you can get. Boot camps have itssuppor
							ters andits detractors.</p>
							<div class="br"></div>
						</aside>
						<aside class="single_sidebar_widget popular_post_widget">
							<h3 class="widget_title">Popular Posts</h3>
							<div class="media post_item">
								<img src="img/blog/popular-post/post1.jpg" alt="post">
								<div class="media-body">
									<a href="blog-details.html">
										<h3>Space The Final Frontier</h3>
									</a>
									<p>02 Hours ago</p>
								</div>
							</div>
							<div class="media post_item">
								<img src="img/blog/popular-post/post2.jpg" alt="post">
								<div class="media-body">
									<a href="blog-details.html">
										<h3>The Amazing Hubble</h3>
									</a>
									<p>02 Hours ago</p>
								</div>
							</div>
							<div class="media post_item">
								<img src="img/blog/popular-post/post3.jpg" alt="post">
								<div class="media-body">
									<a href="blog-details.html">
										<h3>Astronomy Or Astrology</h3>
									</a>
									<p>03 Hours ago</p>
								</div>
							</div>
							<div class="media post_item">
								<img src="img/blog/popular-post/post4.jpg" alt="post">
								<div class="media-body">
									<a href="blog-details.html">
										<h3>Asteroids telescope</h3>
									</a>
									<p>01 Hours ago</p>
								</div>
							</div>
							<div class="br"></div>
						</aside>
						<aside class="single_sidebar_widget ads_widget">
							<a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
							<div class="br"></div>
						</aside>
						<aside class="single_sidebar_widget post_category_widget">
							<h4 class="widget_title">Post Catgories</h4>
							<ul class="list cat-list">
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Technology</p>
										<p>37</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Lifestyle</p>
										<p>24</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Fashion</p>
										<p>59</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Art</p>
										<p>29</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Food</p>
										<p>15</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Architecture</p>
										<p>09</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Adventure</p>
										<p>44</p>
									</a>
								</li>
							</ul>
							<div class="br"></div>
						</aside>
						<aside class="single-sidebar-widget newsletter_widget">
							<h4 class="widget_title">Newsletter</h4>
							<p>
								Here, I focus on a range of items and features that we use in life without
								giving them a second thought.
							</p>
							<div class="form-group d-flex flex-row">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="ti-email" aria-hidden="true"></i></div>
									</div>
									<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
								</div>
								<a href="#" class="bbtns">Subcribe</a>
							</div>
							<p class="text-bottom">You can unsubscribe at any time</p>
							<div class="br"></div>
						</aside>
						<aside class="single-sidebar-widget tag_cloud_widget">
							<h4 class="widget_title">Tag Clouds</h4>
							<ul class="list">
								<li><a href="#">Technology</a></li>
								<li><a href="#">Fashion</a></li>
								<li><a href="#">Architecture</a></li>
								<li><a href="#">Fashion</a></li>
								<li><a href="#">Food</a></li>
								<li><a href="#">Technology</a></li>
								<li><a href="#">Lifestyle</a></li>
								<li><a href="#">Art</a></li>
								<li><a href="#">Adventure</a></li>
								<li><a href="#">Food</a></li>
								<li><a href="#">Lifestyle</a></li>
								<li><a href="#">Adventure</a></li>
							</ul>
						</aside>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================Blog Area =================-->

	<!--================ Start footer Area  =================-->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Top Products</h4>
					<ul>
						<li><a href="#">Managed Website</a></li>
						<li><a href="#">Manage Reputation</a></li>
						<li><a href="#">Power Tools</a></li>
						<li><a href="#">Marketing Service</a></li>
					</ul>
				</div>
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Quick Links</h4>
					<ul>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Brand Assets</a></li>
						<li><a href="#">Investor Relations</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>
				</div>
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Features</h4>
					<ul>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Brand Assets</a></li>
						<li><a href="#">Investor Relations</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>
				</div>
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Resources</h4>
					<ul>
						<li><a href="#">Guides</a></li>
						<li><a href="#">Research</a></li>
						<li><a href="#">Experts</a></li>
						<li><a href="#">Agencies</a></li>
					</ul>
				</div>
				<div class="col-lg-4 col-md-6 single-footer-widget">
					<h4>Newsletter</h4>
					<p>You can trust us. we only send promo offers,</p>
					<div class="form-wrap" id="mc_embed_signup">
						<form
						target="_blank"
						action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
						method="get"
						class="form-inline"
						>
						<input
						class="form-control"
						name="EMAIL"
						placeholder="Your Email Address"
						onfocus="this.placeholder = ''"
						onblur="this.placeholder = 'Your Email Address'"
						required=""
						type="email"
						/>
						<button class="click-btn btn btn-default">
							<span>subscribe</span>
						</button>
						<div style="position: absolute; left: -5000px;">
							<input
							name="b_36c4fd991d266f23781ded980_aefe40901a"
							tabindex="-1"
							value=""
							type="text"
							/>
						</div>

						<div class="info"></div>
					</form>
				</div>
			</div>
		</div>
		<div class="row footer-bottom d-flex justify-content-between">
			<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			</p>
			<div class="col-lg-4 col-sm-12 footer-social">
				<a href="#"><i class="ti-facebook"></i></a>
				<a href="#"><i class="ti-twitter"></i></a>
				<a href="#"><i class="ti-dribbble"></i></a>
				<a href="#"><i class="ti-linkedin"></i></a>
			</div>
		</div>
	</div>
</footer>
<!--================ End footer Area  =================-->
@endsection