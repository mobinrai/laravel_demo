<div class="row g-3">
    @include('admin.forms.validation_error')
    <div class="col-md-6">
        <label class="form-label" for="title">Title</label>
        <input class="form-control" id="title" name="title"
            value="{{ old('title') ? old('title') : $book->title }}" type="text"
            placeholder="enter title">
            <span class="form-example-text ps-2">(enter alphabets, space and numbers only.e.g: black day or black day 1)</span>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="sub-title">Sub title</label>
        <input class="form-control" id="sub-title" name="sub_title"
            value="{{ old('sub_title') ? old('sub_title') : $book->sub_title }}" type="text"
            placeholder="enter sub title">
            <span class="form-example-text ps-2">(enter alphabets, space and numbers only.e.g: black day or black day 1)</span>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="isbn-number">Isbn</label>
        <input class="form-control" id="isbn-number" name="isbn"
            value="{{ old('isbn') ? old('isbn') : $book->isbn}}" type="text"
            placeholder="enter isbn number">
            <span class="form-example-text ps-2">(enter numbers only with atleast 10.e.g: 9999999999)</span>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="isbn-number-13">Isbn 13</label>
        <input class="form-control" id="isbn-number-13" name="isbn_13"
            value="{{ old('isbn_13') ? old('isbn_13') : $book->isbn_13}}" type="text"
            placeholder="enter isbn number 13">
            <span class="form-example-text ps-2">(enter numbers only with atleast 13.e.g: 9999999999)</span>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="serial-number">Serial Number</label>
        <input class="form-control" id="serial-number" name="serial_number"
            value="{{ old('serial_number') ? old('serial_number') : $book->serial_number }}" type="text"
            placeholder="enter serial number">
            <span class="form-example-text ps-2">(enter numbers only with atleast 10.e.g: 123467890)</span>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="edition">Edition</label>
        <input class="form-control" id="edition" name="edition"
            value="{{ old('edition') ? old('edition') : $book->edition }}" type="text"
            placeholder="enter edition">
            <span class="form-example-text ps-2">(enter alphabets, space only.e.g: first edition)</span>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="marked-price">Marked price</label>
        <input class="form-control" id="marked-price" name="marked_price"
            value="{{ old('marked_price') ? old('marked_price') : $book->marked_price }}" type="text"
            placeholder="enter marked price">
            <span class="form-example-text ps-2">(enter numbers with decimal .e.g: 4.5 or 4)</span>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="sale-price">Sale price</label>
        <input class="form-control" id="sale-price" name="sale_price"
            value="{{ old('sale_price') ? old('sale_price') : $book->sale_price }}" type="text"
            placeholder="enter sale price">
        <span class="form-example-text ps-2">(enter numbers with decimal .e.g: 4.5 or 4)</span>    
    </div>
    <div class="col-md-6">
        <label class="form-label" for="pages">Pages</label>
        <input class="form-control" id="pages" name="pages"
            value="{{ old('pages') ? old('pages') : $book->pages }}" type="text"
            placeholder="enter pages">
        <span class="form-example-text ps-2">(enter numbers only.e.g: 100, 500)</span>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="stock-quantity">Stock quantity</label>
        <input class="form-control" id="stock-quantity" name="stock_quantity"
            value="{{ old('stock_quantity') ? old('stock_quantity') : $book->stock_quantity }}" type="text"
            placeholder="enter stock quantity">
        <span class="form-example-text ps-2">(enter numbers only.e.g: 100, 500)</span>
    </div>
    <div class="col-md-6">
        <label class="form-label">Category</label>        
        <select name="category" id="category" class="form-select">            
            @php
                $category=old('category') ? old('category') :($book->getBookCategoryAttribute('id'));            
            @endphp            
            <option value="">select category</option>
            @foreach ($categories as $item)
                <option value="{{ $item->id }}" @if ($category == $item->id) {{ 'selected' }} @endif>
                    {{ $item->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">Author</label>        
        <select name="author" id="author" class="form-select">            
            @php
                $author_id=old('author') ? old('author') :($book->getBookAuthorAttribute('id'));
            @endphp
            <option value="">select author</option>
            @foreach ($authors as $item)
                <option value="{{ $item->id }}" @if ($author_id == $item->id) {{ 'selected' }} @endif>
                    {{ $item->getFullNameAttribute() }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-6">
        <label class="form-label" for="publication">Publication</label>        
        <select name="publication" id="publication" class="form-select">            
            @php
                $publication_id=old('publication') ? old('publication') :$book->publication_id;            
            @endphp            
            <option value="">select publication</option>
            @foreach ($publications as $item)
                <option value="{{ $item->id }}" @if ($publication_id == $item->id) {{ 'selected' }} @endif>
                    {{ $item->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-6">
        <label class="form-label">Published Date</label>
        <input class="form-control" id="published-date" name="published_date"
            value="{{ old('published_date') ? old('published_date') : $book->published_date }}" type="text" 
            placeholder="enter published date">
        <span class="form-example-text ps-2">(enter date only.e.g: 2022-04-02)</span>
    </div>
    <div class="col-md-6">
        <label class="form-label">Genre</label>        
        <select name="genre" id="genre" class="form-select">            
            @php
                $genre_id=old('genre') ? old('genre') :($book->getBookGenreAttribute('id'));            
            @endphp
            <option value="">select genre</option>
            @foreach ($genres as $item)
                <option value="{{ $item->id }}" @if ($genre_id == $item->id) {{ 'selected' }} @endif>
                    {{ $item->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">Status</label><br>
        @php
            $status = old('status') ? old('status') : $book->status;
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
        @if ($book->image)
            <img src="{{ asset('assets/images/books/' . $book->image) }}" id="old_image" class="img-90">
            <br>
        @endif        
        <input type="file" class="form-control" id="image" name="image">
        <br>
        <img src="" id="new_image" class="img-90 d-none">&nbsp;
    </div>
    <div class="col-12 mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description" id="basic-form-textarea" rows="3" placeholder="Description">{{old('description')?old('description'):$book->description }}
        </textarea>
    </div>
</div>
