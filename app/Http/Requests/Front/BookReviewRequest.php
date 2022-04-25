<?php

namespace App\Http\Requests\Front;

use App\Http\traits\ValidationRuleTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookReviewRequest extends FormRequest
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
            'book' => ['required', $this->regexNumbersOnly(), Rule::exists('books', 'id')],
            'name' => ['required', $this->regexAlphabetWithSpace()],
            'email' => ['required', 'email'],
            'comment' => ['required', ]
        ];
    }

    public function messages()
    {
        return [
            'book.exists' => 'Invalid requested book',
        ];
    }
}
