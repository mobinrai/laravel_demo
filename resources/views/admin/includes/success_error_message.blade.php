@if(session('message'))
    <div class="alert alert-soft-warning rounded-0 d-flex align-items-center" role="alert">
        <span class="fas fa-info-circle text-warning me-2"></span>
        <p class="mb-0 flex-1">{{ session('message') }}</p>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-soft-success rounded-0 d-flex align-items-center" role="alert">
        <span class="fas fa-check-circle text-success me-2"></span>
        <p class="mb-0 flex-1">{{session('success')}}</p>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-outline-danger rounded-0 d-flex align-items-center" role="alert">
        <span class="fas fa-times-circle text-danger me-2"></span>
        <p class="mb-0 flex-1">{{session('error')}}</p>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
