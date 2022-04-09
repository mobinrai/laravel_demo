<?php

namespace App\Http\Controllers\Admin;

use App\Models\BookType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookTypeRequest;

class BookTypeController extends Controller
{
    //
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param  App\Http\Requests\Admin\BookTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookTypeRequest $request)
    {
        $data = $request->validated();

        BookType::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookType  $bookType
     * @return \Illuminate\Http\Response
     */
    public function show(BookType $bookType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookType  $bookType
     * @return \Illuminate\Http\Response
     */
    public function edit(BookType $bookType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\BookTypeRequest  $request
     * @param  \App\Models\BookType  $bookType
     * @return \Illuminate\Http\Response
     */
    public function update(BookTypeRequest $request, BookType $bookType)
    {
        $data = $request->validated();

        $bookType->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookType  $bookType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookType $bookType)
    {
        $bookType->delete();
    }
}
