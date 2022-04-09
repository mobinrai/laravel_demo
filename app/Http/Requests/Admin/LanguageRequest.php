<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class LanguageRequest extends FormRequest
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
        $unique = Rule::unique('languages', 'title');

        if(Route::getCurrentRoute()->getName()==='admin.languages.update'){
            $unique = Rule::unique('languages', 'title')->ignore($this->language->id, 'id');
        }

        return [
                'title' => ['required','min:2','max:50','regex:/(^[A-Za-z]+$)+/', $unique],
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
            'title.regex'=>'Please enter only alphabets',
            'title.unique'=>'Please enter different language name,language name has already taken',
            'title.required'=>'Please enter language name'
        ];
    }
}
