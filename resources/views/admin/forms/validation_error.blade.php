@if ($errors->any())
    <div class="alert alert-outline-danger d-flex align-items-center rounded-0" role="alert">
        @foreach ($errors->all() as $error)
                <span class="fas fa-times-circle text-danger me-1"></span>
                <p class="mb-0 flex-1">{{$error}}</p>
                <br>
        @endforeach       
    </div>
@endif
@csrf