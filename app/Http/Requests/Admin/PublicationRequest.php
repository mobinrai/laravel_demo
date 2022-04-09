<?php

namespace App\Http\Requests\Admin;

use App\Http\traits\ValidationRuleTrait;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\FormRequest;

class PublicationRequest extends FormRequest
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
        $unique = Rule::unique('publications', 'title');

        if(Route::getCurrentRoute()->getName()==='admin.publications.update'){
            $unique = Rule::unique('publications', 'title')->ignore($this->publication->id, 'id');
        }

        return [
            'title' => ['required','min:2','max:190', $this->regexAlphabetWithSpace(), $unique],
            'website'=> ['sometimes', 'nullable', 'url'],
            'status' => ['required',$this->validateActiveInactiveRule()],
            'email' => ['sometimes', 'nullable', 'email'],
            'city' => ['sometimes', 'nullable','max:190',$this->regexAlphabetWithSpace()],
            'post_box'=> ['sometimes', 'nullable', 'numeric', 'digits_between:4,5'],
            'country' => ['sometimes','nullable','numeric', $this->checkGivenidInTable('countries')],
            'address' => ['sometimes', 'nullable','max:190', 'regex:/(^[A-Za-z-_,0-9 ]+$)+/'],
            'fax' =>  ['sometimes', 'nullable', $this->regexNumbersAndPlus(), 'min:10', 'max:14'],
            'phone' => ['sometimes', 'nullable', $this->regexNumbersAndPlus(), 'min:10', 'max:14'],
            'publication_image' => ['sometimes', 'nullable', $this->validateImageMimes(),'max:2048'],
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
            'country.exists' => 'Please select valid country name',
            'country.numeric' => 'Please select valid country name',
        ];
    }

}
