@extends('admin.layouts.main')
@section('title')
    countries
@endsection
@section('content')
    <div class="pb-5">
        <div class="row g-5">
            <div class="col-12 col-xxl-6">
                <div class="mb-4">
                    <h3>All Countries</h3>
                    <h5 class="text-700 fw-semi-bold">Add, update and delete countries...
                        <a href="{{ route('admin.countries.create') }}" class="fr">Add new country</a>
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
                                                        <th>Name</th>
                                                        <th>Sortname</th>
                                                        <th>Phone code</th>                                                        
                                                        <th>No. of Athors</th>
                                                        <th>No. of Publications</th>
                                                        <th>Created At</th>                                                        
                                                        <th colspan="2">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    @foreach ($countries as $item)
                                                        <tr>
                                                            <td class="p-2">{{ $item->name }}</td>
                                                            <td class="p-2">{{ $item->sortname }}</td>
                                                            <td class="p-2">{{ $item->phoneCode }}</td>                                                        
                                                            <td class="p-2">{{ $item->authors()->count() }}</td>
                                                            <td class="p-2">{{ $item->publications()->count() }}</td>
                                                            <td class="p-2">{{ $item->created_at }}</td>
                                                            <td class="p-2">
                                                                <a href="{{ route('admin.countries.edit', ['country' => $item->id]) }}">Edit</a>
                                                            </td>
                                                            <td class="p-2">
                                                                <form action="{{ route('admin.countries.destroy', ['country' => $item->id]) }}" id="delete-country-{{$loop->iteration}}" method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <a href="" onclick="event.preventDefault(); document.getElementById('delete-country-{{$loop->iteration}}').submit();" class="text-danger">Delete</a>
                                                                </form>
                                                                
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="4" class="p-1">
                                                            {{ $countries->links('admin.includes.pagination') }}</td>
                                                    </tr>

                                                </tfoot>
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
