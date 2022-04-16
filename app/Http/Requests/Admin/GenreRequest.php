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
                'genre_image' => ['sometimes', 'nullable','mimes:jpeg,png,jpg,gif,svg','max:2048'],
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
            'genre_image.mimes' => 'Please upload only jpeg,png,jpg,gif,svg images',
            'genre_image.max' => 'Please upload image not bigger than 2048kb',
        ];
    }
}
