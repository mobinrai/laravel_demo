<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

use App\Models\Language;
use App\Http\Requests\Admin\LanguageRequest;

class LanguageController extends Controller
{
    private $routeName = 'admin.languages.index';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $languages = Language::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language = new Language;
        return view('admin.languages.create', compact('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        $data = $request->validated();
        Language::create([
            'title' => Str::title($data['title'])
        ]);
        return redirect(route($this->routeName))
                ->with('success', 'Language added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        return view('admin.languages.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageRequest $request, Language $language)
    {
        $data = $request->validated();

        $language->update([
            'title'=>Str::title($data['title'])
        ]);

        return redirect(route($this->routeName))->with('success', 'Language updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $type = 'error';

        if($language->books()->count() > 0) {
            $message = 'Could not delete. Language has '.$language->books()->count().' number/s of book/s';
        } else {
            $language->delete();
            $type = 'success';
            $message = 'Language deleted successfully';
        }
        return redirect(route($this->routeName))->with($type, $message);
    }
}
