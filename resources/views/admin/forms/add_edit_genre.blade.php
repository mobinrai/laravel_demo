@include('admin.forms.validation_error')
<div class="mb-3">
    <label class="form-label" for="title">Title</label>
    <input class="form-control" id="title" name="title" value="{{old('title')?old('title'):$genre->title}}"
        type="text" placeholder="enter title">
</div>
<div class="mb-3">
    <label class="form-label" for="image">Image</label>
    <br>
    @if($genre->image)
        <img src="{{asset('assets/images/genre/'.$genre->image)}}" id="old_image"
            class="img-90">
    @endif
    <input type="file" class="form-control" id="image" name="image">
    <br>
    <img src="" id="new_image" class="img-90 d-none">
</div>
<div class="mb-3">
    @php
        $status = old('status')?old('status'):$genre->status
    @endphp
    <div class="form-check form-check-inline">
        <input class="form-check-input" id="active" type="radio" name="status" value="Active" {{$status=='Active'?'checked':''}}>
        <label class="form-check-label" for="active">Active</label>
    </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" id="inactive" type="radio" name="status" value="Inactive" {{$status=='Inactive'?'checked':''}}>
        <label class="form-check-label" for="inactive">Inactive</label>
    </div>
</div>
