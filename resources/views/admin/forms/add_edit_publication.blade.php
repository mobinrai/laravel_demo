<div class="row g-3">
    @include('admin.forms.validation_error')
    <div class="col-12">
        <label class="form-label" for="title">Title</label>
        <input class="form-control" id="title" name="title"
            value="{{ old('title') ? old('title') : $publication->title }}" type="text"
            placeholder="enter title">
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input class="form-control" id="email" name="email"
            value="{{ old('email') ? old('email') : $publication->email }}" type="text" placeholder="enter email">
    </div>
    <div class="col-md-6">
        <label class="form-label">Website</label>
        <input class="form-control" id="website" name="website"
            value="{{ old('website') ? old('website') : $publication->website }}" type="text" placeholder="enter website">
    </div>
    <div class="col-md-6">
        <label class="form-label">Country</label>
        <select name="country_id" id="country_id" class="form-select">
            @php
                $country_id = old('country_id') ? old('country_id') : $publication->country_id;
            @endphp
            <option value="">select country</option>
            @foreach ($countries as $item)
                <option value="{{ $item->id }}" @if ($country_id == $item->id) {{ 'selected' }} @endif
                    data-code="{{ $item->phoneCode }}">
                    {{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-6">
        <label class="form-label">City</label>
        <input class="form-control" id="city" name="city"
            value="{{ old('city') ? old('city') : $publication->city }}" type="text" placeholder="enter city">
    </div>
    <div class="col-9">
        <label class="form-label">Address</label>
        <input class="form-control" id="address" name="address"
            value="{{ old('address') ? old('address') : $publication->address }}" type="text" placeholder="enter address">
    </div>
    <div class="col-3">
        <label class="form-label" for="post-box">Post Box</label>
        <input class="form-control" id="post-box" name="post_box"
            value="{{ old('post_box') ? old('post_box') : $publication->post_box }}" type="text" placeholder="enter post box">
    </div>
    <div class="col-md-3">
        <label class="form-label">Country code</label><br>
        @if ($publication->country)
            <span class="form-control phone-code" id="phone-code">+{{ $publication->country->phoneCode }}</span>
        @else
            <span class="form-control phone-code" id="phone-code">+0</span>
        @endif
    </div>
    <div class="col-9">
        <label class="form-label" for="fax">Fax</label>
        <input class="form-control" id="fax" name="fax"
            value="{{ old('fax') ? old('fax') : $publication->fax }}" type="text" placeholder="enter fax">
    </div>
    <div class="col-md-3">
        <label class="form-label">Country code</label><br>
        @if ($publication->country)
            <span class="form-control phone-code" id="phone-code">+{{ $publication->country->phoneCode }}</span>
        @else
            <span class="form-control phone-code" id="phone-code">+0</span>
        @endif
    </div>
    <div class="col-9">
        <label class="form-label">Phone</label>
        <input class="form-control" id="phone" name="phone"
            value="{{ old('phone') ? old('phone') : $publication->phone }}" type="text" placeholder="enter phone">
    </div>
    <div class="col-md-6">
        <label class="form-label">Status</label><br>
        @php
            $status = old('status') ? old('status') : $publication->status;
        @endphp
        <div class="form-check ps-6">
            <input class="form-check-input" id="active" type="radio" name="status" value="Active"
                {{ $status == 'Active' ? 'checked' : '' }}>
            <label class="form-check-label" for="active">Active</label>
        </div>
        <div class="form-check ps-6">
            <input class="form-check-input" id="inactive" type="radio" name="status" value="Inactive"
                {{ $status == 'Inactive' ? 'checked' : '' }}>
            <label class="form-check-label" for="inactive">Inactive</label>
        </div>
    </div>
    <div class="col-12">
        <label class="form-label">Image</label>
        <br>
        @if ($publication->image)
            <img src="{{ asset('assets/images/publications/' . $publication->image) }}" id="old_image" class="img-90">
        @endif
        <input type="file" class="form-control" id="image" name="image">
        <br>
        <img src="" id="new_image" class="img-90 d-none">&nbsp;

    </div>
</div>
