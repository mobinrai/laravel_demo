@extends('admin.layouts.main')
@section('title')
    show book
@endsection
@section('content')
    <div class="pb-5">
        <div class="row g-5">
            <div class="col-12 col-xxl-6">
                <div class="mb-4">
                    <h3>Publication</h3>
                    <br>
                    <h5 class="text-700 fw-semi-bold">
                        Detail for {{Str::upper($book->title)}}
                        @include('admin.includes.breadcrum',['title'=>'book'])
                    </h5>
                </div>
                <hr class="bg-200 mb-3 mt-2">
                <div class="row flex-between-center mb-3 g-3">                    
                    <div class="col-12 col-sm-6">
                       <a href="{{route('admin.books.create')}}">Add new book</a>
                       &nbsp;/&nbsp;
                       <a href="{{route('admin.books.index')}}">Back to books</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xxl-6">
                <div class="row g-3">
                    <div class="col-12 col-md-12">
                        <div class="card border rounded-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="shadow-sm p-3 mb-22 bg-body rounded">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Title:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$book->title}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Sub title:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$book->sub_title}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Isbn:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$book->isbn}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Isbn 13:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$book->isbn_13}}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Serial Number:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$book->serial_number}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Edition:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$book->edition}}</span>
                                        </div>                                        
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Sale price:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$book->sale_price}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Mark price:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$book->marked_price}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Author:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$book->getBookAuthorAttribute()}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Category:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$book->getBookCategoryAttribute()}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Pages:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$book->pages}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Stock Quantiy:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$book->stock_quantity}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Publication:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{Str::ucfirst($book->publication->title)}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Published Date:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$book->published_date}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Status:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$book->status}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Genre:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$book->getBookGenreAttribute()}}</span>
                                        </div>
                                        <div class="col-11 col-offset-1 mb-2">
                                            <label class="form-label">Description:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$book->description}}</span>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <label class="form-label">Image:</label><br>
                                            &nbsp;<img src="{{asset('assets/images/books/'.$book->image)}}" class="img-150-250 ps-3">
                                        </div>
                                        <div class="col-12 mb-2">
                                            <label class="form-label">
                                                <form action="{{ route('admin.books.destroy', ['book' => $book->id]) }}" id="delete-book" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                                <a href="{{route('admin.books.edit', ['book' => $book->id])}}">Edit</a>&nbsp;|&nbsp;
                                                <a href="" onclick="event.preventDefault(); document.getElementById('delete-book').submit();" class="text-danger">Delete</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
