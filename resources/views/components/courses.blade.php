<!--================ Start Popular Courses Area =================-->
<div class="popular_courses">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<div class="main_title">
					<h2 class="mb-3">Nuestras carreras</h2>
					<p>
						Elige la mejor carrera para desempeñarte en el ambito laboral
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- single course -->
			<div class="col-lg-12">

				<div class="owl-carousel active_course">
					@foreach($courses as $course)
					<div class="single_course">
						<div class="course_head">
							<img class="img-fluid" src="{{ asset('imagenes/carreras/'. $course->image) }}" alt="{{ $course->name }}" style="width: 330px; height: 260px;" />
						</div>
						<div class="course_content">
							<h4 class="mb-3">
								<a href="course-details.html">{{ $course->name }}</a>
							</h4>
							<p>
								{{ $course->description }}
							</p>
							<div
							class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4"
							>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
</div>
<!--================ End Popular Courses Area =================-->