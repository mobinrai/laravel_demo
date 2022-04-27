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
            'rating' => ['sometimes', 'numeric', 'min:0', 'max:5'],
            'comment' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'book.exists' => 'Invalid requested book',
        ];
    }
}
