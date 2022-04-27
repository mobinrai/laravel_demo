<?php

namespace App\Http\Requests\Front;

use App\Http\traits\ValidationRuleTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShoppingCartRequest extends FormRequest
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
            'quantity' => ['sometimes', $this->regexNumbersOnly()]
        ];
    }
}
