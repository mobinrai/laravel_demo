@extends('admin.layouts.main')
@section('title')
    languages
@endsection
@section('content')
    <div class="pb-5">
        <div class="row g-5">
            <div class="col-12 col-xxl-6">
                <div class="mb-4">
                    <h3>All Languages</h3>
                    <h5 class="text-700 fw-semi-bold">Add, update and delete languages...
                        <a href="{{ route('admin.languages.create') }}" class="fr">Add new language</a>
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
                                                        <th>Code</th>
                                                        <th>Slug</th>
                                                        <th>No. of Books</th>
                                                        <th>Created At</th>                                                        
                                                        <th colspan="2">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    @forelse ($languages as $item)
                                                        <tr>
                                                            <td class="p-2">{{ $item->title }}</td>
                                                            <td class="p-2">{{ $item->code }}</td>
                                                            <td class="p-2">{{ $item->slug }}</td>                                                          
                                                            <td class="p-2">{{ $item->books()->count() }}</td>
                                                            <td class="p-2">{{ $item->created_at }}</td>
                                                            <td class="p-2">
                                                                <a href="{{ route('admin.languages.edit', ['language' => $item->id]) }}">Edit</a>
                                                            </td>
                                                            <td class="p-2">
                                                                <form action="{{ route('admin.languages.destroy', ['language' => $item->id]) }}" id="delete-language-{{$loop->iteration}}" method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <a href="" onclick="event.preventDefault(); document.getElementById('delete-language-{{$loop->iteration}}').submit();" class="text-danger">Delete</a>
                                                                </form>
                                                                
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6">No data..</td>
                                                        </tr>    
                                                    @endforelse
                                                </tbody>
                                                @if ($languages->hasPages())
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="4" class="p-1">
                                                                {{ $languages->links('admin.includes.pagination') }}</td>
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
