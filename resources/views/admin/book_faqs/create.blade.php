@extends('admin.layouts.main')
@section('title')
    add book faq
@endsection
@section('content')
    <div class="pb-5">
        <div class="row g-5">
            <div class="col-12 col-xxl-6">
                <div class="mb-4">
                    <h3>New Book Faq</h3>
                    <h5 class="text-700 fw-semi-bold">
                        Add new Book Faq
                        @include('admin.includes.breadcrum',['title'=>'book faq'])
                    </h5>
                </div>
                <hr class="bg-200 mb-3 mt-2">
                <div class="row flex-between-center mb-3 g-3">
                    <div class="col-12 col-sm-6">
                       <a href="{{route('admin.book-faqs.index')}}">Back to book faqs</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xxl-6">
                <div class="row g-3">
                    <div class="col-12 col-md-12">
                        <div class="card border rounded-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="shadow-sm p-3 mb-12 bg-body rounded">
                                    <form action="{{route('admin.book-faqs.store')}}" method="POST">
                                        @include('admin.forms.add_edit_book_faq')
                                        <div class="mb-3">
                                            <input class="form-control btn btn-primary rounded-0" value="Add" type="submit">
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