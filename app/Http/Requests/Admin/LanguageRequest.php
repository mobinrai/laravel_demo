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
        $unique_code = Rule::unique('languages', 'code');

        if(Route::getCurrentRoute()->getName()==='admin.languages.update'){
            $unique = Rule::unique('languages', 'title')->ignore($this->language->id, 'id');
            $unique_code = Rule::unique('languages', 'code')->ignore($this->language->id, 'id');
        }

        return [
                'code' => ['required','min:2','max:5', 'regex:/(^[A-Za-z]+$)+/', $unique_code],
                'title' => ['required','min:2','max:50','regex:/(^[A-Za-z;, ()]+$)+/', $unique],
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
            'title.regex'=>'Please enter only alphabets, space, semi-colon, opening and closing brackets',
            'title.unique'=>'Please enter different language name,language name has already taken',
            'title.required'=>'Please enter language name',
            'code.regex'=>'Please enter only alphabets without space for language code',
            'code.unique'=>'Please enter different language code,language code has already taken',
            'code.required'=>'Please enter language code',
        ];
    }
}
