<div class="dataTable-info">Mostrando 1 de {{ $paginator->count() }} registros</div>

@if($paginator->hasPages())

<ul class="pagination pagination-primary float-end dataTable-pagination">
	 @if ($paginator->onFirstPage())
	<li class="page-item pager disabled"><a href="#" class="page-link" data-page="1">‹</a></li>
	@else
	<li class="page-item pager"><a href="{{ $paginator->previousPageUrl() }}" class="page-link" data-page="{{ $paginator->previousPageUrl() }}">‹</a></li>
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
        <li class="page-item pager"><a href="{{ $paginator->nextPageUrl() }}" class="page-link" data-page="{{ $paginator->lastPage() }}">›</a></li>
        @else
        <li class="page-item pager disabled"><a href="#" class="page-link" data-page="">›</a></li>
        @endif
	
</ul>

@endif