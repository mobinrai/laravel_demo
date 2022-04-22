@extends('admin.layouts.main')
@section('title')
    show publication
@endsection
@section('content')
    <div class="pb-5">
        <div class="row g-5">
            <div class="col-12 col-xxl-6">
                <div class="mb-4">
                    <h3>Publication</h3>
                    <br>
                    <h5 class="text-700 fw-semi-bold">
                        Detail for {{Str::upper($publication->title)}}
                        @include('admin.includes.breadcrum',['title'=>'publication'])
                    </h5>
                </div>
                <hr class="bg-200 mb-3 mt-2">
                <div class="row flex-between-center mb-3 g-3">                    
                    <div class="col-12 col-sm-6">
                       <a href="{{route('admin.publications.create')}}">Add new publication</a>
                       &nbsp;/&nbsp;
                       <a href="{{route('admin.publications.index')}}">Back to publications</a>
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
                                        <div class="col-12 mb-2">
                                            <label class="form-label">Title:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$publication->title}}</span>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <label class="form-label">Country:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$publication->country->name}}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">City:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$publication->city}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Address:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$publication->address}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">                                        
                                            <label class="form-label">Phone:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$publication->getPhoneNumberAttribute()}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Fax:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$publication->getFaxAttribute()}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Email:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$publication->email}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Website:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$publication->website}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Post Box:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$publication->post_box}}</span>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Status:</label><br>
                                            <span class="old-data ps-3"> &nbsp;{{$publication->status}}</span>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <label class="form-label">Image:</label><br>
                                            &nbsp;<img src="{{asset('assets/images/publications/'.$publication->image)}}" class="img-150-250 ps-3">
                                        </div>
                                        <div class="col-12 mb-2">
                                            <label class="form-label">
                                                <form action="{{ route('admin.publications.destroy', ['publication' => $publication->id]) }}" id="delete-publication" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                                <a href="{{route('admin.publications.edit', ['publication' => $publication->id])}}">Edit</a>&nbsp;|&nbsp;
                                                <a href="" onclick="event.preventDefault(); document.getElementById('delete-publication').submit();" class="text-danger">Delete</a>
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
