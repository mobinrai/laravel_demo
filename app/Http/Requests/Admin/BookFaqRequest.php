<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\traits\ValidationRuleTrait;

class BookFaqRequest extends FormRequest
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
            'book'=>['required','numeric', $this->checkGivenidInTable('books')],
            'question' =>['required','max:255', "regex:/(^[a-zA-Z,\/ '-?]+$)+/"],
            'answer' =>['required','max:255', "regex:/(^[a-zA-Z,!@#$% \/'-.]+$)+/"],
        ];
    }
}
