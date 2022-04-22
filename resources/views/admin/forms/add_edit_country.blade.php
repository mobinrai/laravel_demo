@include('admin.forms.validation_error')
<div class="mb-3">
    <label class="form-label" for="name">Title</label>
    <input class="form-control" id="name" name="name" value="{{old('name')?old('name'):$country->name}}" 
        type="text" placeholder="enter name">
</div>
<div class="mb-3">
    <label class="form-label" for="sortname">Sortname</label>
    <input class="form-control" id="sortname" name="sortname" value="{{old('sortname')?old('sortname'):$country->sortname}}"
        type="text" placeholder="enter sortname">
</div>
<div class="mb-3">
    <label class="form-label" for="phone-code">Phone Code</label>
    <input class="form-control" id="phone-code" name="phoneCode" value="{{old('phoneCode')?old('phoneCode'):$country->phoneCode}}"
        type="text" placeholder="enter phone code">
</div>