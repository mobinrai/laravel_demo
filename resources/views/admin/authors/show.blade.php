@extends('admin.layouts.main')
@section('title')
    show author
@endsection
@section('content')
    <div class="pb-5">
        <div class="row g-5">
            <div class="col-22 col-xxl-6">
                <div class="mb-4">
                    <h3>Author</h3>
                    <br>
                    <h5 class="text-700 fw-semi-bold">
                        Detail for {{Str::upper($author->getFullNameAttribute())}} 
                        @include('admin.includes.breadcrum',['title'=>'author'])
                    </h5>
                </div>
                <hr class="bg-200 mb-3 mt-2">
                <div class="row flex-between-center mb-3 g-3">                    
                    <div class="col-22 col-sm-6">
                       <a href="{{route('admin.authors.create')}}">Add new author</a>
                       &nbsp;/&nbsp;
                       <a href="{{route('admin.authors.index')}}">Back to authors</a>
                    </div>
                </div>
            </div>
            <div class="col-22 col-xxl-6">
                <div class="row g-3">
                    <div class="col-22 col-md-22">
                        <div class="card border rounded-0 shadow-sm h-200">
                            <div class="card-body">
                                <div class="shadow-sm p-3 mb-22 bg-body rounded">
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <label class="form-label">First name:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$author->first_name}} </span>                                
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label class="form-label">Middle name:</label><br>
                                            <span class="old-data ps-3">&nbsp;{{$author->middle_name}}</span>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label class="form-label">Last name:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$author->last_name}}</span>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <label class="form-label">Country:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$author->country->name}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">                                        
                                            <label class="form-label">Address:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$author->address}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">                                        
                                            <label class="form-label">Phone:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$author->getPhoneNumberAttribute()}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Email:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$author->email}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Website:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$author->website}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Top Author:</label><br>
                                            <span class="old-data ps-3 "> &nbsp;{{$author->top_author}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Status:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$author->status}}</span>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <label class="form-label">Description:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$author->description}}</span>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <label class="form-label">Image:</label><br>
                                            &nbsp;<img src="{{asset('assets/images/authors/'.$author->image)}}" class="img-150-250 ps-3">
                                        </div>                                        
                                        <div class="col-12 mb-2">
                                            <label class="form-label">
                                                <form action="{{ route('admin.authors.destroy', ['author' => $author->id]) }}" id="delete-author" method="post">
                                                    @method('DELETE')
                                                    @csrf                                                
                                                </form>
                                                <a href="{{route('admin.authors.edit', ['author' => $author->id])}}">Edit</a>&nbsp;|&nbsp;
                                                <a href="" onclick="event.preventDefault(); document.getElementById('delete-author').submit();" class="text-danger">Delete</a>
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