<?php

namespace App\Http\Requests\Admin;

use App\Http\traits\ValidationRuleTrait;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
{
    use ValidationRuleTrait;
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
        $unique = Rule::unique('genres', 'title');

        if(Route::getCurrentRoute()->getName()==='admin.genres.update'){
            $unique = Rule::unique('genres', 'title')->ignore($this->genre->id, 'id');
        }

        return [
                'title' => ['required','min:3','max:50',$this->regexAlphabetWithSpace(), $unique],
                'image' => ['sometimes', 'nullable'],
                'image.*'=> ['mimes:jpeg,jpg,png','max:2048'],
                'status' => ['required', $this->validateActiveInactiveRule()]
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
            'title.regex'=>'Please enter only alphabets and space',
            'title.unique'=>'Please enter different genre name,genre name has alredy taken',
            'title.required'=>'Please enter genre name',
            'image.mimes' => 'Please upload only jpeg,png,jpg images',
            'image.max' => 'Please upload image not bigger than 2048kb',
        ];
    }
}
