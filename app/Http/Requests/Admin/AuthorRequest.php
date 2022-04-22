<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;
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
        $unique_email = Rule::unique('authors', 'title');

        if(Route::getCurrentRoute()->getName()==='admin.authors.update'){
            $unique_email = Rule::unique('authors', 'email')->ignore($this->author->id, 'id');
        }
        return [
            'first_name' => ['required', 'min:3', $this->regexAlphabetWithSpace()],
            'middle_name' => ['sometimes', 'nullable', $this->regexAlphabetWithSpace()],
            'last_name' => ['required', 'min:3', $this->regexAlphabetWithSpace()],
            'email' => ['required', 'email', $unique_email],
            'country_id' => ['required', $this->checkGivenidInTable('countries')],
            'phone' => ['sometimes', 'nullable', 'numeric', 'min:10'],
            'image' => ['sometimes', 'nullable'],
            'image.*'=> [$this->validateImageMimes(),'max:2048'],
            'address' => ['sometimes', 'nullable', 'regex:/(^[A-Za-z -_.0-9\',]+$)+/'],
            'status' => ['required', $this->validateActiveInactiveRule()],
            'top_author' =>['required', Rule::in(['Yes', 'No'])],
            'website' => ['sometimes', 'nullable', 'url'],
            'description'=> ['sometimes', 'nullable'],
        ];
    }
}
