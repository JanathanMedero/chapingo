<header class="header_area">
	<div class="main_menu">
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between" method="" action="">
					<input
					type="text"
					class="form-control"
					id="search_input"
					placeholder="Search Here"
					/>
					<button type="submit" class="btn"></button>
					<span
					class="ti-close"
					id="close_search"
					title="Close Search"
					></span>
				</form>
			</div>
		</div>

		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<a class="navbar-brand logo_h" href="{{ route('home') }}"
				><img src="{{ asset('imagenes/logo.png') }}" alt=""
				/></a>
				<button
				class="navbar-toggler"
				type="button"
				data-toggle="collapse"
				data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent"
				aria-expanded="false"
				aria-label="Toggle navigation"
				>
				<span class="icon-bar"></span> <span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div
			class="collapse navbar-collapse offset"
			id="navbarSupportedContent"
			>
			<ul class="nav navbar-nav menu_nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="about-us.html">Nosotros</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('blog') }}">Blog</a>
				</li>
				<li class="nav-item submenu dropdown">
					<a
					href="#"
					class="nav-link dropdown-toggle"
					data-toggle="dropdown"
					role="button"
					aria-haspopup="true"
					aria-expanded="false"
					>Paginas</a
					>
					<ul class="dropdown-menu">
						<li class="nav-item">
							<a class="nav-link" href="courses.html">Courses</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="course-details.html"
							>Course Details</a
							>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="elements.html">Elements</a>
						</li>
					</ul>
				</li>
				@auth
				<li class="nav-item submenu dropdown">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Inicio sesión: {{ Auth::user()->name }}</a>
					<ul class="dropdown-menu">
						<li class="nav-item">
							<a class="nav-link" href="{{ route('admin') }}">Administración</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							<span>Cerrar Sesión</span>
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>

					</li>
				</ul>
			</li>
			@endauth
			@guest
			<li class="nav-item">
				<a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
			</li>
			@endguest
		</ul>
	</div>
</div>
</nav>
</div>
</header>