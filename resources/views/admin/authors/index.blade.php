@extends('admin.layouts.main')
@section('title')
    authors
@endsection
@section('content')
    <div class="pb-5">
        <div class="row g-5">
            <div class="col-12 col-xxl-6">
                <div class="mb-4">
                    <h3>All authors</h3>
                    <h5 class="text-700 fw-semi-bold">Add, update and delete authors...
                        <a href="{{ route('admin.authors.create') }}" class="fr">Add new author</a>
                    </h5>
                </div>
            </div>
            <hr class="bg-200 mb-3 mt-2">
            <div class="col-12 col-xxl-6">
                <div class="row g-3">
                    <div class="col-12 col-md-12">
                        <div class="card border rounded-0 shadow-sm h-100">
                            <div class="card-body">
                                @include('admin.includes.success_error_message')
                                <div class="shadow-sm p-3 mb-12 bg-body rounded">
                                    <div id="tableExample">
                                        <div class="table-responsive scrollbar">
                                            <table class="table table-bordered table-striped fs--1 mb-0">
                                                <thead class="bg-200 text-900">
                                                    <tr>
                                                        <th>First name</th>
                                                        <th>Middle name</th>
                                                        <th>Last name</th>
                                                        <th>Country</th>
                                                        <th>Address</th>                                                     
                                                        <th>Top Author</th>
                                                        <th>Description</th>
                                                        <th>Image</th>
                                                        <th>Created At</th>
                                                        <th>No. of Books</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    @foreach ($authors as $item)
                                                        <tr>
                                                            <td class="p-2">{{ $item->first_name }}</td>
                                                            <td class="p-2">{{ $item->middle_name }}</td>
                                                            <td class="p-2">{{ $item->last_name }}</td>
                                                            <td class="p-2">{{ $item->country->name}}</td>
                                                            <td class="p-2">{{ $item->address }}</td>
                                                            <td class="p-2">{{ $item->top_author }}</td>
                                                            <td class="p-2">{!! Str::limit($item->description, 50, ' ...') !!}</td>   
                                                            <td class="p-2"> 
                                                                <img class="img-90" src="{{asset('assets/images/authors/'.$item->image)}}">
                                                            </td>
                                                            <td class="p-2">{{ $item->created_at }}</td>
                                                            <td class="p-2">{{ $item->books()->count() }}</td>
                                                            <td class="p-2">
                                                                <a href="{{ route('admin.authors.show', ['author' => $item->id]) }}">Show Detail</a>
                                                            </td>                                                            
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                @if ($authors->hasPages())
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="4" class="p-1">
                                                                {{ $authors->links('admin.includes.pagination') }}</td>
                                                        </tr>
                                                    </tfoot>
                                                @endif
                                            </table>
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
