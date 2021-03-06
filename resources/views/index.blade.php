@extends('layouts.template')

@section('head')
Chapingo
@endsection

@section('content')
<body>
	<!--================ Start Header Menu Area =================-->
	<x-header></x-header>
	<!--================ End Header Menu Area =================-->


	@if($images->isNotEmpty())
	<!--================ Start Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="banner_inner">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 px-0">

						<div id="slider" class="carousel slide carousel-fade" data-ride="carousel"> 

							<!-- Indicators -->
							<ul class="carousel-indicators">
								@foreach ($images as $indexKey => $image)

						           	<li data-target="#slider" data-slide-to="{{ $indexKey }}" class="active"></li>
						        @endforeach
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner" style="max-height: 1000px;">

								@foreach($images as $image)
									@if($loop->first)
									<div class="carousel-item active">
										<img src="{{ asset('imagenes/slider/'.$image->image) }}" class="img-fluid">
									</div>
									@else
									<div class="carousel-item">
										<img src="{{ asset('imagenes/slider/'.$image->image) }}" class="img-fluid">
									</div>
									@endif
								@endforeach
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#slider" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#slider" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================ End Home Banner Area =================-->

@endif

<!--================ Start Feature Area =================-->
<section class="feature_area section_gap_top">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="main_title">
					<h2 class="mb-3">Universidad Aut??noma de Chapingo</h2>
					{{-- <p>
						Replenish man have thing gathering lights yielding shall you
					</p> --}}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="single_feature">
					<div class="icon"><span class="flaticon-student"></span></div>
					<div class="desc">
						<h4 class="mt-3 mb-2">Facilidad de becas</h4>
						<p>
							Obt??n una de nuestras becas completas hasta la finalizaci??n de tu carrera
						</p>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6">
				<div class="single_feature">
					<div class="icon"><span class="flaticon-book"></span></div>
					<div class="desc">
						<h4 class="mt-3 mb-2">Cursos en l??nea</h4>
						<p>
							Capacitaci??n constante con nuestros cursos en l??nea
						</p>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6">
				<div class="single_feature">
					<div class="icon"><span class="flaticon-earth"></span></div>
					<div class="desc">
						<h4 class="mt-3 mb-2">Certificaci??n global</h4>
						<p>
							Al finalizar tu carrera, obtendras tu certificaci??n valida en cualquier parte del mundo
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================ End Feature Area =================-->

<x-courses></x-courses>



<!--================ Start Registration Area =================-->
{{-- <div class="section_gap registration_area">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-7">
				<div class="row clock_sec clockdiv" id="clockdiv">
					<div class="col-lg-12">
						<h1 class="mb-3">Register Now</h1>
						<p>
							There is a moment in the life of any aspiring astronomer that
							it is time to buy that first telescope. It???s exciting to think
							about setting up your own viewing station.
						</p>
					</div>
					<div class="col clockinner1 clockinner">
						<h1 class="days">150</h1>
						<span class="smalltext">Days</span>
					</div>
					<div class="col clockinner clockinner1">
						<h1 class="hours">23</h1>
						<span class="smalltext">Hours</span>
					</div>
					<div class="col clockinner clockinner1">
						<h1 class="minutes">47</h1>
						<span class="smalltext">Mins</span>
					</div>
					<div class="col clockinner clockinner1">
						<h1 class="seconds">59</h1>
						<span class="smalltext">Secs</span>
					</div>
				</div>
			</div>
			<div class="col-lg-4 offset-lg-1">
				<div class="register_form">
					<h3>Courses for Free</h3>
					<p>It is high time for learning</p>
					<form
					class="form_area"
					id="myForm"
					action="mail.html"
					method="post"
					>
					<div class="row">
						<div class="col-lg-12 form_group">
							<input
							name="name"
							placeholder="Your Name"
							required=""
							type="text"
							/>
							<input
							name="name"
							placeholder="Your Phone Number"
							required=""
							type="tel"
							/>
							<input
							name="email"
							placeholder="Your Email Address"
							pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
							required=""
							type="email"
							/>
						</div>
						<div class="col-lg-12 text-center">
							<button class="primary-btn">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div> --}}
<!--================ End Registration Area =================-->

<!--================ Start Trainers Area =================-->
<section class="trainer_area section_gap_top">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<div class="main_title">
					<h2 class="mb-3">Our Expert Trainers</h2>
					<p>
						Replenish man have thing gathering lights yielding shall you
					</p>
				</div>
			</div>
		</div>
		<div class="row justify-content-center d-flex align-items-center">
			<div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
				<div class="thumb d-flex justify-content-sm-center">
					<img class="img-fluid" src="img/trainer/t1.jpg" alt="" />
				</div>
				<div class="meta-text text-sm-center">
					<h4>Mated Nithan</h4>
					<p class="designation">Sr. web designer</p>
					<div class="mb-4">
						<p>
							If you are looking at blank cassettes on the web, you may be
							very confused at the.
						</p>
					</div>
					<div class="align-items-center justify-content-center d-flex">
						<a href="#"><i class="ti-facebook"></i></a>
						<a href="#"><i class="ti-twitter"></i></a>
						<a href="#"><i class="ti-linkedin"></i></a>
						<a href="#"><i class="ti-pinterest"></i></a>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
				<div class="thumb d-flex justify-content-sm-center">
					<img class="img-fluid" src="img/trainer/t2.jpg" alt="" />
				</div>
				<div class="meta-text text-sm-center">
					<h4>David Cameron</h4>
					<p class="designation">Sr. web designer</p>
					<div class="mb-4">
						<p>
							If you are looking at blank cassettes on the web, you may be
							very confused at the.
						</p>
					</div>
					<div class="align-items-center justify-content-center d-flex">
						<a href="#"><i class="ti-facebook"></i></a>
						<a href="#"><i class="ti-twitter"></i></a>
						<a href="#"><i class="ti-linkedin"></i></a>
						<a href="#"><i class="ti-pinterest"></i></a>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
				<div class="thumb d-flex justify-content-sm-center">
					<img class="img-fluid" src="img/trainer/t3.jpg" alt="" />
				</div>
				<div class="meta-text text-sm-center">
					<h4>Jain Redmel</h4>
					<p class="designation">Sr. Faculty Data Science</p>
					<div class="mb-4">
						<p>
							If you are looking at blank cassettes on the web, you may be
							very confused at the.
						</p>
					</div>
					<div class="align-items-center justify-content-center d-flex">
						<a href="#"><i class="ti-facebook"></i></a>
						<a href="#"><i class="ti-twitter"></i></a>
						<a href="#"><i class="ti-linkedin"></i></a>
						<a href="#"><i class="ti-pinterest"></i></a>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
				<div class="thumb d-flex justify-content-sm-center">
					<img class="img-fluid" src="{{ asset('img/trainer/t4.jpg') }}" alt="" />
				</div>
				<div class="meta-text text-sm-center">
					<h4>Nathan Macken</h4>
					<p class="designation">Sr. web designer</p>
					<div class="mb-4">
						<p>
							If you are looking at blank cassettes on the web, you may be
							very confused at the.
						</p>
					</div>
					<div class="align-items-center justify-content-center d-flex">
						<a href="#"><i class="ti-facebook"></i></a>
						<a href="#"><i class="ti-twitter"></i></a>
						<a href="#"><i class="ti-linkedin"></i></a>
						<a href="#"><i class="ti-pinterest"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================ End Trainers Area =================-->

<!--================ Start Events Area =================-->
<div class="events_area">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<div class="main_title">
					<h2 class="mb-3 text-white">Upcoming Events</h2>
					<p>
						Replenish man have thing gathering lights yielding shall you
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="single_event position-relative">
					<div class="event_thumb">
						<img src="img/event/e1.jpg" alt="" />
					</div>
					<div class="event_details">
						<div class="d-flex mb-4">
							<div class="date"><span>15</span> Jun</div>

							<div class="time-location">
								<p>
									<span class="ti-time mr-2"></span> 12:00 AM - 12:30 AM
								</p>
								<p>
									<span class="ti-location-pin mr-2"></span> Hilton Quebec
								</p>
							</div>
						</div>
						<p>
							One make creepeth man for so bearing their firmament won't
							fowl meat over seas great
						</p>
						<a href="#" class="primary-btn rounded-0 mt-3">View Details</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="single_event position-relative">
					<div class="event_thumb">
						<img src="img/event/e2.jpg" alt="" />
					</div>
					<div class="event_details">
						<div class="d-flex mb-4">
							<div class="date"><span>15</span> Jun</div>

							<div class="time-location">
								<p>
									<span class="ti-time mr-2"></span> 12:00 AM - 12:30 AM
								</p>
								<p>
									<span class="ti-location-pin mr-2"></span> Hilton Quebec
								</p>
							</div>
						</div>
						<p>
							One make creepeth man for so bearing their firmament won't
							fowl meat over seas great
						</p>
						<a href="#" class="primary-btn rounded-0 mt-3">View Details</a>
					</div>
				</div>
			</div>

			<div class="col-lg-12">
				<div class="text-center pt-lg-5 pt-3">
					<a href="#" class="event-link">
						View All Event <img src="img/next.png" alt="" />
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!--================ End Events Area =================-->

<!--================ Start Testimonial Area =================-->
<div class="testimonial_area section_gap">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<div class="main_title">
					<h2 class="mb-3">Client say about me</h2>
					<p>
						Replenish man have thing gathering lights yielding shall you
					</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="testi_slider owl-carousel">
				<div class="testi_item">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<img src="img/testimonials/t1.jpg" alt="" />
						</div>
						<div class="col-lg-8">
							<div class="testi_text">
								<h4>Elite Martin</h4>
								<p>
									Him, made can't called over won't there on divide there
									male fish beast own his day third seed sixth seas unto.
									Saw from
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="testi_item">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<img src="img/testimonials/t2.jpg" alt="" />
						</div>
						<div class="col-lg-8">
							<div class="testi_text">
								<h4>Davil Saden</h4>
								<p>
									Him, made can't called over won't there on divide there
									male fish beast own his day third seed sixth seas unto.
									Saw from
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="testi_item">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<img src="img/testimonials/t1.jpg" alt="" />
						</div>
						<div class="col-lg-8">
							<div class="testi_text">
								<h4>Elite Martin</h4>
								<p>
									Him, made can't called over won't there on divide there
									male fish beast own his day third seed sixth seas unto.
									Saw from
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="testi_item">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<img src="img/testimonials/t2.jpg" alt="" />
						</div>
						<div class="col-lg-8">
							<div class="testi_text">
								<h4>Davil Saden</h4>
								<p>
									Him, made can't called over won't there on divide there
									male fish beast own his day third seed sixth seas unto.
									Saw from
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="testi_item">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<img src="img/testimonials/t1.jpg" alt="" />
						</div>
						<div class="col-lg-8">
							<div class="testi_text">
								<h4>Elite Martin</h4>
								<p>
									Him, made can't called over won't there on divide there
									male fish beast own his day third seed sixth seas unto.
									Saw from
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="testi_item">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<img src="img/testimonials/t2.jpg" alt="" />
						</div>
						<div class="col-lg-8">
							<div class="testi_text">
								<h4>Davil Saden</h4>
								<p>
									Him, made can't called over won't there on divide there
									male fish beast own his day third seed sixth seas unto.
									Saw from
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--================ End Testimonial Area =================-->

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


@push('extra-js')
<script>
	$('.carousel').carousel({
		interval: 3500
	})
</script>
@endpush