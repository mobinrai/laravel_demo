@extends('admin.layouts.main')
@section('title')
    genres
@endsection
@section('content')
    <div class="pb-5">
        <div class="row g-5">
            <div class="col-12 col-xxl-6">
                <div class="mb-4">
                    <h3>All genres</h3>
                    <h5 class="text-700 fw-semi-bold">Add, update and delete genres...
                        <a href="{{ route('admin.genres.create') }}" class="fr">Add new genre</a>
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
                                                        <th>Title</th>
                                                        <th>Status</th>
                                                        <th>Image</th>
                                                        <th>Created At</th>
                                                        <th>No. of Books</th>
                                                        <th colspan="2">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    @forelse ($genres as $item)
                                                        <tr>
                                                            <td class="p-2">{{ $item->title }}</td>
                                                            <td class="p-2">{{ $item->status }}</td>
                                                            <td class="p-2"> <img class="img-90" src="{{asset('assets/images/genre/'.$item->image)}}"></td>
                                                            <td class="p-2">{{ $item->created_at }}</td>
                                                            <td class="p-2">{{ $item->books()->count() }}</td>
                                                            <td class="p-2">
                                                                <a href="{{ route('admin.genres.edit', ['genre' => $item->id]) }}">Edit</a>
                                                            </td>
                                                            <td class="p-2">
                                                                <form action="{{ route('admin.genres.destroy', ['genre' => $item->id]) }}" id="delete-genre-{{$loop->iteration}}" method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <a href="" onclick="event.preventDefault(); document.getElementById('delete-genre-{{$loop->iteration}}').submit();" class="text-danger">Delete</a>
                                                                </form>
                                                                
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6">No data..</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                                @if($genres->hasPages())
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="4" class="p-1">
                                                                {{ $genres->links('admin.includes.pagination') }}</td>
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
