<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CountryRequest;

class CountryController extends Controller
{
    private $routeName = 'admin.countries.index';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = new Country;
        return view('admin.countries.create', compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        /**
         * while creating country, 
         * sortname is translated to upper case in country model
         */
        $data = $request->validated();
        Country::create($data);
        return redirect(route($this->routeName))->with('success', 'Country created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\CountryRequest  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, Country $country)
    {
        //
        $data = $request->validated();

        $country->update($data);

        return redirect(route($this->routeName))->with('success', 'Country updated successfully');
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $type = 'success';
        $message = 'Country deleted successfully';

        if($country->authors()->count() > 0){
            $type = 'error';
            $message = 'Could not delete. Country has '.$country->authors()->count().' number/s of author/s';
        }
        else if($country->publications()->count() > 0){
            $type = 'error';
            $message = 'Could not delete. Country has '.$country->publications()->count().' number/s of publication/s';
        }
        else{
            $country->delete();            
        }
        return redirect(route($this->routeName))->with($type, $message);
    }
}
