@extends('admin.layouts.main')
@section('title')
    book faqs
@endsection
@section('content')
    <div class="pb-5">
        <div class="row g-5">
            <div class="col-12 col-xxl-6">
                <div class="mb-4">
                    <h3>All Book Faqs</h3>
                    <h5 class="text-700 fw-semi-bold">Add, update and delete book faqs...
                        <a href="{{ route('admin.book-faqs.create') }}" class="fr">Add new book faq</a>
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
                                                        <th>Book Name</th>
                                                        <th>Question</th>
                                                        <th>Answer</th>
                                                        <th>Created At</th>
                                                        <th colspan="2">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    @forelse ($bookFaqs as $item)
                                                        <tr>
                                                            <td class="p-2">{{ $item->book->title }}</td>
                                                            <td class="p-2">{{ $item->question }}</td>
                                                            <td class="p-2">{!! Str::limit($item->answer, 50, ' ...') !!}</td>
                                                            <td class="p-2">{{ $item->created_at }}</td>
                                                            <td class="p-2">
                                                                <a href="{{route('admin.book-faqs.edit',['book_faq'=>$item->id])}}">Edit</a>
                                                            </td>                                                       
                                                            <td class="p-2">
                                                                <form action="{{ route('admin.book-faqs.destroy', ['book_faq' => $item->id]) }}" id="delete-book-faq-{{$loop->iteration}}" method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                </form>                                                                
                                                                <a href="" onclick="event.preventDefault(); document.getElementById('delete-book-faq-{{$loop->iteration}}').submit();" class="text-danger">Delete</a>
                                                                
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5">No data...</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                                @if($bookFaqs->hasPages())
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="4" class="p-1">
                                                                {{ $bookFaqs->links('admin.includes.pagination') }}</td>
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
