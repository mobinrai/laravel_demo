@if(session('message'))
    <div class="alert alert-soft-warning rounded-0 d-flex align-items-center" role="alert">
        <span class="fas fa-info-circle text-warning me-2"></span>
        <p class="mb-0 flex-1">{{ session('message') }}</p>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close">
            <i class="fa fa-times"></i>
        </button>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-soft-success d-flex align-items-center px-xl-5 pb-3" role="alert">
        <span class="fas fa-check-circle text-success me-2"></span>
        <p class="mb-0 flex-1">{{session('success')}}</p>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close">
            <i class="fa fa-times"></i>
        </button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-outline-danger d-flex align-items-center px-xl-5 pb-3" role="alert">
        <span class="fas fa-times-circle text-danger me-2"></span>
        <p class="mb-0 flex-1">{{session('error')}}</p>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close">
            <i class="fa fa-times"></i>
        </button>
    </div>
@endif