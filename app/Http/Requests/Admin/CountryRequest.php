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

        if(Route::getCurrentRoute()->getName()==='admin.countries.update'){
            $unique = Rule::unique('countries', 'name')->ignore($this->country->id, 'id');
        }

        return [
                'name' => ['required', 'string','min:2','max:20','regex:/(^[A-Za-z ]+$)+/', $unique],
                "sortname" =>['required','string','min:2', 'max:2','regex:/(^[A-Za-z]+$)+/'],
                "phoneCode" => ['required', 'numeric', 'digits_between:2,3', 'regex:/(^[0-9]+$)+/'],
            ];
    }
}
