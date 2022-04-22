@extends('admin.layouts.main')
@section('title')
    update book
@endsection
@section('content')
    <div class="pb-5">
        <div class="row g-5">
            <div class="col-12 col-xxl-6">
                <div class="mb-4">
                    <h3>Update/Edit Book</h3>
                    <h5 class="text-700 fw-semi-bold">
                        update/edit Book
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
                                <div class="shadow-sm p-3 mb-12 bg-body rounded">
                                    <form action="{{route('admin.books.update',['book'=>$book->id])}}" method="POST" enctype="multipart/form-data">
                                        @method('PATCH')
                                        @include('admin.forms.add_edit_book')
                                        <div class="mb-3">
                                            <input class="form-control btn btn-primary rounded-0" value="Update" type="submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection