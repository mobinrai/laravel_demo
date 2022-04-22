@include('admin.forms.validation_error')
<div class="mb-3">
    <label class="form-label" for="title">Title</label>
    <input class="form-control" id="title" name="title" value="{{old('title')?old('title'):$language->title}}" 
        type="text" placeholder="enter title">
</div>
<div class="mb-3">
    <label class="form-label" for="code">Code</label>
    <input class="form-control" id="code" name="code" value="{{old('code')?old('code'):$language->code}}"
        type="text" placeholder="enter code">
</div>
