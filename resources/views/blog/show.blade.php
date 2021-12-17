@extends('layouts.template')

@section('head')
Chapingo - Blog - {{ $notice->title }}
@endsection

@section('content')

<x-header></x-header>

<!--================Blog Area =================-->
<section class="blog_area single-post-area section_gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 posts-list">
				<div class="single-post row">
					<div class="col-lg-12">
						<div class="feature-img">
							<img class="img-fluid" src="{{ asset('imagenes/noticias/'.$notice->image) }}" alt="">
						</div>
					</div>
					{{-- <div class="col-lg-3  col-md-3">
						<div class="blog_info text-right">
							<ul class="blog_meta list">
								<li><a href="#">{{ $notice->user->name }}<i class="ti-user"></i></a></li>
								<li><a href="#">{{ $notice->created_at->format('j F Y') }}<i class="ti-calendar"></i></a></li>
							</ul>
							<ul class="social-links">
								<li><a href="#"><i class="ti-facebook"></i></a></li>
								<li><a href="#"><i class="ti-twitter"></i></a></li>
								<li><a href="#"><i class="ti-github"></i></a></li>
								<li><a href="#"><i class="ti-linkedin"></i></a></li>
							</ul>
						</div>
					</div> --}}
					<div class="col-lg-12 col-md-9 blog_details">
						<div class="row">
							<div class="col-md-12">
								<p class="mb-0 text-muted">{{ $notice->created_at->format('j F Y') }}</p>
							</div>
							<div class="col-md-12 mt-4">
								<h2>{{ $notice->title }}</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 mt-4">
								{!! $notice->body !!}
							</div>
						</div>
					</div>
				</div>
				{{-- <div class="navigation-area">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
							<div class="thumb">
								<a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
							</div>
							<div class="arrow">
								<a href="#"><i class="text-white ti-arrow-left"></i></a>
							</div>
							<div class="detials">
								<p>Prev Post</p>
								<a href="#">
									<h4>Space The Final Frontier</h4>
								</a>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
							<div class="detials">
								<p>Next Post</p>
								<a href="#">
									<h4>Telescopes 101</h4>
								</a>
							</div>
							<div class="arrow">
								<a href="#"><i class="text-white ti-arrow-right"></i></a>
							</div>
							<div class="thumb">
								<a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
							</div>
						</div>
					</div>
				</div> --}}


				{{-- <div class="comments-area">
					<h4>05 Comments</h4>
					<div class="comment-list">
						<div class="single-comment justify-content-between d-flex">
							<div class="user justify-content-between d-flex">
								<div class="thumb">
									<img src="img/blog/c1.jpg" alt="">
								</div>
								<div class="desc">
									<h5><a href="#">Emilly Blunt</a></h5>
									<p class="date">December 4, 2017 at 3:12 pm </p>
									<p class="comment">
										Never say goodbye till the end comes!
									</p>
								</div>
							</div>
							<div class="reply-btn">
								<a href="" class="btn-reply text-uppercase">reply</a>
							</div>
						</div>
					</div>
					<div class="comment-list left-padding">
						<div class="single-comment justify-content-between d-flex">
							<div class="user justify-content-between d-flex">
								<div class="thumb">
									<img src="img/blog/c2.jpg" alt="">
								</div>
								<div class="desc">
									<h5><a href="#">Elsie Cunningham</a></h5>
									<p class="date">December 4, 2017 at 3:12 pm </p>
									<p class="comment">
										Never say goodbye till the end comes!
									</p>
								</div>
							</div>
							<div class="reply-btn">
								<a href="" class="btn-reply text-uppercase">reply</a>
							</div>
						</div>
					</div>
					<div class="comment-list left-padding">
						<div class="single-comment justify-content-between d-flex">
							<div class="user justify-content-between d-flex">
								<div class="thumb">
									<img src="img/blog/c3.jpg" alt="">
								</div>
								<div class="desc">
									<h5><a href="#">Annie Stephens</a></h5>
									<p class="date">December 4, 2017 at 3:12 pm </p>
									<p class="comment">
										Never say goodbye till the end comes!
									</p>
								</div>
							</div>
							<div class="reply-btn">
								<a href="" class="btn-reply text-uppercase">reply</a>
							</div>
						</div>
					</div>
					<div class="comment-list">
						<div class="single-comment justify-content-between d-flex">
							<div class="user justify-content-between d-flex">
								<div class="thumb">
									<img src="img/blog/c4.jpg" alt="">
								</div>
								<div class="desc">
									<h5><a href="#">Maria Luna</a></h5>
									<p class="date">December 4, 2017 at 3:12 pm </p>
									<p class="comment">
										Never say goodbye till the end comes!
									</p>
								</div>
							</div>
							<div class="reply-btn">
								<a href="" class="btn-reply text-uppercase">reply</a>
							</div>
						</div>
					</div>
					<div class="comment-list">
						<div class="single-comment justify-content-between d-flex">
							<div class="user justify-content-between d-flex">
								<div class="thumb">
									<img src="img/blog/c5.jpg" alt="">
								</div>
								<div class="desc">
									<h5><a href="#">Ina Hayes</a></h5>
									<p class="date">December 4, 2017 at 3:12 pm </p>
									<p class="comment">
										Never say goodbye till the end comes!
									</p>
								</div>
							</div>
							<div class="reply-btn">
								<a href="" class="btn-reply text-uppercase">reply</a>
							</div>
						</div>
					</div>
				</div> --}}
				{{-- <div class="comment-form">
					<h4>Leave a Reply</h4>
					<form>
						<div class="form-group form-inline">
							<div class="form-group col-lg-6 col-md-6 name">
								<input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''"
								onblur="this.placeholder = 'Enter Name'">
							</div>
							<div class="form-group col-lg-6 col-md-6 email">
								<input type="email" class="form-control" id="email" placeholder="Enter email address"
								onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
							</div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''"
							onblur="this.placeholder = 'Subject'">
						</div>
						<div class="form-group">
							<textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
							onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
						</div>
						<a href="#" class="primary-btn">Post Comment</a>
					</form>
				</div> --}}
			</div>
			<div class="col-lg-4">
				<div class="blog_right_sidebar">
					<aside class="single_sidebar_widget author_widget">
						<img class="author_img rounded-circle" src="{{ Avatar::create($notice->user->name)->toBase64() }}" alt="">
						<h4>{{ $notice->user->name }}</h4>
						@auth
						@if($notice->user->hasRole('administrator'))
						<p>Administrador</p>
						@elseif($notice->user->hasRole('moderator'))
						<p>Moderador</p>
						@else
						<p>Redactor</p>
						@endif
						@endauth
						<p class="mb-0">Creador de la noticia</p>
						<div class="br"></div>
					</aside>
					<aside class="single_sidebar_widget popular_post_widget">
						<h3 class="widget_title">Ultimas noticias</h3>

						@foreach($latestNotices as $notice)
						<div class="media post_item">
							<a href="{{ route('blog.show', $notice->slug) }}">
								<img src="{{ asset('imagenes/noticias/'.$notice->image) }}" class="img-fluid" style="width: 100px" alt="post">
							</a>
							<div class="media-body">
								<a href="{{ route('blog.show', $notice->slug) }}">
									<h3>{{ $notice->title }}</h3>
								</a>
								<p>{{ $notice->created_at->diffForHumans() }}</p>
							</div>
						</div>
						@endforeach
					</aside>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================Blog Area =================-->

<x-footer></x-footer>

@endsection