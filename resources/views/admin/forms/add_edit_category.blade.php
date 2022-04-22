@include('admin.forms.validation_error')
<div class="mb-3">
    <label class="form-label" for="title">Title</label>
    <input class="form-control" id="title" name="title" value="{{old('title')?old('title'):$category->title}}"
        type="text" placeholder="enter title">
</div>
<div class="mb-3">
    <label class="form-label" for="parent">Parent</label>
    <select class="form-select" aria-label="select parent" name="parent" id="parent">
        <option selected="" value="0">select parent</option>
        @php
          $parent_id = old('parent')?old('parent'):$category->parent_id
        @endphp
        @foreach($categories as $item)
        @if($category->id == $item->id)
            @continue
        @endif
            <option value="{{$item->id}}" {{$parent_id==$item->id?'selected':''}}>{{$item->title}}</option>
        @endforeach    
    </select>
</div>
<div class="mb-3">
    @php
        $status = old('status')?old('status'):$category->status
    @endphp
    <div class="form-check form-check-inline">
        <input class="form-check-input" id="active" type="radio" name="status" value="Active" {{$status=='Active'?'checked':''}}>
        <label class="form-check-label" for="active">Active</label>
    </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" id="inactive" type="radio" name="status" value="Inactive" {{$status=='Inactive'?'checked':''}}>
        <label class="form-check-label" for="inactive">Inactive</label>
    </div>
    {{-- <div class="form-check form-switch">
        <input class="form-check-input" id="status" type="checkbox" name="status" {{$status=='active'?'checked=""':''}}>
        <label class="form-check-label" for="status">Active</label>
    </div> --}}
</div>
