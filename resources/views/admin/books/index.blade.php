@extends('admin.layouts.main')
@section('title')
    books
@endsection
@section('content')
    <div class="pb-5">
        <div class="row g-5">
            <div class="col-12 col-xxl-6">
                <div class="mb-4">
                    <h3>All Books</h3>
                    <h5 class="text-700 fw-semi-bold">Add, update and delete books...
                        <a href="{{ route('admin.books.create') }}" class="fr">Add new book</a>
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
                                                        <th>Sub title</th>
                                                        <th>Serial number</th>                                                        
                                                        <th>Isbn</th>
                                                        <th>Isbn 13</th>
                                                        <th>Status</th>
                                                        <th>Created At</th>
                                                        <th colspan="2">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    @forelse ($books as $item)
                                                        <tr>
                                                            <td class="p-2">{{ $item->title }}</td>
                                                            <td class="p-2">{{ $item->sub_title }}</td>
                                                            <td class="p-2">{{ $item->serial_number }}</td>
                                                            <td class="p-2">{{ $item->isbn }}</td>
                                                            <td class="p-2">{{ $item->isbn_13 }}</td>
                                                            <td class="p-2">{{ $item->status }}</td>
                                                            <td class="p-2">{{ $item->created_at }}</td>                                                            
                                                            <td class="p-2"><a href="{{route('admin.books.show',['book'=>$item->id])}}">Show Detail</a></td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="9">No data...</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                                @if($books->hasPages())
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="4" class="p-1">
                                                                {{ $books->links('admin.includes.pagination') }}</td>
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
