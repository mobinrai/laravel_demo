<?php

namespace App\Http\Requests\Admin;

use App\Http\traits\ValidationRuleTrait;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class CategoryRequest extends FormRequest
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
        $unique = Rule::unique('categories', 'title');

        if(Route::getCurrentRoute()->getName()=="admin.categories.update"){
            $unique = Rule::unique('categories', 'title')->ignore($this->category->id, 'id');
        }

        return [
            'title' => ['required','min:2','max:190',$this->regexAlphabetWithSpace(), $unique],
            'status' => ['required', $this->validateActiveInactiveRule()],
            'parent' => ['sometimes','nullable','numeric', $this->checkGivenidInTable('categories')],
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
            'title.unique'=>'Please enter different name, name has alredy taken',
            'title.required'=>'Please enter category name'
        ];
    }
}
