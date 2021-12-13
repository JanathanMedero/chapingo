<div>

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible show fade mt-4 mb-0">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('delete'))
    <div class="alert alert-danger alert-dismissible show fade">
        {{ session('delete') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

</div>