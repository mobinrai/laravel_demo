<div class="row g-3">
    @include('admin.forms.validation_error')
    <div class="col-md-4">
        <label class="form-label" for="first-name">First name</label>
        <input class="form-control" id="first-name" name="first_name"
            value="{{ old('first_name') ? old('first_name') : $author->first_name }}" type="text"
            placeholder="enter first name">
    </div>
    <div class="col-md-4">
        <label class="form-label" for="middle-name">Middle name</label>
        <input class="form-control" id="middle-name" name="middle_name"
            value="{{ old('middle_name') ? old('middle_name') : $author->middle_name }}" type="text"
            placeholder="enter middle name">
    </div>
    <div class="col-md-4">
        <label class="form-label" for="last-name">Last name</label>
        <input class="form-control" id="last-name" name="last_name"
            value="{{ old('last_name') ? old('last_name') : $author->last_name }}" type="text"
            placeholder="enter last name">
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input class="form-control" id="email" name="email"
            value="{{ old('email') ? old('email') : $author->email }}" type="text" placeholder="enter email">
    </div>
    <div class="col-md-6">
        <label class="form-label">Website</label>
        <input class="form-control" id="website" name="website"
            value="{{ old('website') ? old('website') : $author->website }}" type="text" placeholder="enter website">
    </div>
    <div class="col-md-6">
        <label class="form-label">Country</label>
        <select name="country_id" id="country_id" class="form-select">
            @php
                $country_id = old('country_id') ? old('country_id') : $author->country_id;
            @endphp
            <option value="">select country</option>
            @foreach ($countries as $item)
                <option value="{{ $item->id }}" @if ($country_id == $item->id) {{ 'selected' }} @endif
                    data-code="{{ $item->phoneCode }}">
                    {{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">Address</label>
        <input class="form-control" id="address" name="address"
            value="{{ old('address') ? old('address') : $author->address }}" type="text" placeholder="enter address">
    </div>
    <div class="col-md-3">
        <label class="form-label">Country code</label><br>
        @if ($author->country)
            <span class="form-control phone-code" id="phone-code">+{{ $author->country->phoneCode }}</span>
        @else
            <span class="form-control phone-code" id="phone-code">+0</span>
        @endif
        {{-- <input class="form-control" type="text" value="+{{ old('country_code') ? old('country_code') : $author->country->phoneCode }}" name="country_code" id="country-code" readonly> --}}
    </div>
    <div class="col-9">
        <label class="form-label">Phone</label>
        <input class="form-control" id="phone" name="phone"
            value="{{ old('phone') ? old('phone') : $author->phone }}" type="text" placeholder="enter phone">
    </div>
    <div class="col-md-6">
        <label class="form-label">Top Author</label>
        @php
            $top_author = old('top_author') ? old('top_author') : $author->top_author;
        @endphp
        <div class="form-check ps-6">
            <input class="form-check-input" id="yes" type="radio" name="top_author" value="Yes"
                {{ $top_author == 'Yes' ? 'checked' : '' }}>
            <label class="form-check-label mb-0" for="yes">Yes</label>
        </div>
        <div class="form-check ps-6">
            <input class="form-check-input" id="no" type="radio" name="top_author" value="No"
                {{ $top_author == 'No' ? 'checked' : '' }}>
            <label class="form-check-label mb-0" for="no">No</label>
        </div>
    </div>
    <div class="col-md-6">
        <label class="form-label">Status</label><br>
        @php
            $status = old('status') ? old('status') : $author->status;
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
        @if ($author->image)
            <img src="{{ asset('assets/images/authors/' . $author->image) }}" id="old_image" class="img-90">
        @endif
        <input type="file" class="form-control" id="image" name="image">
        <br>
        <img src="" id="new_image" class="img-90 d-none">&nbsp;

    </div>
    <div class="col-12 mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description" id="basic-form-textarea" rows="3" placeholder="Description">
        {{ $author->description }}
    </textarea>
    </div>
</div>
