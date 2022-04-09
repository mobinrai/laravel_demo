<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\traits\ValidationRuleTrait;

class AuthorRequest extends FormRequest
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
        return [
            'first_name' => ['required', 'min:3', $this->regexAlphabetWithSpace()],
            'middle_name' => ['sometimes', 'nullable', $this->regexAlphabetWithSpace()],
            'last_name' => ['required', 'min:3', $this->regexAlphabetWithSpace()],
            'email' => ['required', 'email', Rule::unique('authors', 'email')],
            'country_id' => ['required', $this->checkGivenidInTable('countries')],
            'phone' => ['sometimes', 'nullable', 'numeric', 'digits_between:10,14'],
            'image' => ['sometimes', 'nullable'],
            'address' => ['sometimes', 'nullable', 'regex:/(^[A-Za-z -_.0-9\',]+$)+/'],
            'status' => ['required', $this->validateActiveInactiveRule()],
            'top_author' =>['required', Rule::in(['Yes', 'No'])],
            'website' => ['sometimes', 'nullable', 'url'],
            'description'=> ['sometimes', 'nullable'],
        ];
    }
}
