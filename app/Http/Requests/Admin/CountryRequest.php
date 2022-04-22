<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $unique = Rule::unique('countries', 'name');
        $unique_phone_code = Rule::unique('countries', 'phoneCode');
        $unique_sortname = Rule::unique('countries', 'sortname');

        if(Route::getCurrentRoute()->getName()==='admin.countries.update'){
            $unique = Rule::unique('countries', 'name')->ignore($this->country->id, 'id');
            $unique_phone_code = Rule::unique('countries', 'phoneCode')->ignore($this->country->id, 'id');
            $unique_sortname = Rule::unique('countries', 'sortname')->ignore($this->country->id, 'id');
        }

        return [
                'name' => ['required', 'string','min:2','max:20','regex:/(^[A-Za-z ]+$)+/', $unique],
                "sortname" =>['required','string','min:2', 'max:2','regex:/(^[A-Za-z]+$)+/', $unique_sortname],
                "phoneCode" => ['required', 'numeric', 'digits_between:2,3', 'regex:/(^[0-9]+$)+/', $unique_phone_code],
            ];
    }
    /**
     * Return validation error message for invalid request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.regex'=>'Please enter only alphabets and space for country name',
            'name.unique'=>'Please enter different country name, country name has alredy taken',
            'name.required'=>'Please enter country name',
            'sortname.required'=>'Please enter sortname',
            'phoneCode.required'=>'Please enter phone code',
            'sortname.unique' => 'Please enter different sortname, sortname has alredy taken',
            'phoneCode.unique' => 'Please enter different phone code, phone code has alredy taken',
        ];
    }
}
