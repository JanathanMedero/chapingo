<nav class="blog-pagination justify-content-center d-flex">
	@if($paginator->hasPages())

	<ul class="pagination">

		@if ($paginator->onFirstPage())
		<li class="page-item disabled">
			<a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="Previous" data-page="1">
				<span aria-hidden="true">
					<i class="ti-angle-left"></i>
				</span>
			</a>
		</li>
		@else
		<li class="page-item">
			<a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="Previous" data-page="{{ $paginator->previousPageUrl() }}">
				<span aria-hidden="true">
					<i class="ti-angle-left"></i>
				</span>
			</a>
		</li>
		@endif

		@foreach ($elements as $element)

		@if (is_string($element))
		<li class="disabled"><span>{{ $element }}</span></li>
		@endif

		@if (is_array($element))
		@foreach ($element as $page => $url)
		@if ($page == $paginator->currentPage())
		<li class="page-item active"><a href="#" class="page-link" data-page="{{ $page }}">{{ $page }}</a></li>
		@else
		<li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
		@endif
		@endforeach
		@endif

		@endforeach

		 @if ($paginator->hasMorePages())
		<li class="page-item">
			<a href="{{ $paginator->nextPageUrl() }}" class="page-link" aria-label="Next" data-page="{{ $paginator->lastPage() }}">
				<span aria-hidden="true">
					<i class="ti-angle-right"></i>
				</span>
			</a>
		</li>
		@else
		<li class="page-item disabled">
			<a href="{{ $paginator->nextPageUrl() }}" class="page-link" aria-label="Next" data-page="{{ $paginator->lastPage() }}">
				<span aria-hidden="true">
					<i class="ti-angle-right"></i>
				</span>
			</a>
		</li>
		@endif

	</ul>
	@endif
</nav>