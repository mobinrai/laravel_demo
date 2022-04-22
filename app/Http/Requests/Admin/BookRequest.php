<?php

namespace App\Http\Requests\Admin;

use App\Http\traits\ValidationRuleTrait;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' =>['required', 'regex:/(^[a-zA-Z, 0-9]+$)+/'],
            'sub_title' =>['sometimes','nullable', 'regex:/(^[a-zA-Z, 0-9]+$)+/'],
            'serial_number' => ['required', 'digits_between:10,13'],
            'isbn' => ['sometimes','digits:10'],
            'isbn_13' => ['sometimes', 'digits:13'],
            'edition' =>['required', 'regex:/(^[a-zA-Z, 0-9]+$)+/'],
            'pages' => ['required', 'numeric', 'digits_between:2,10'],
            'marked_price' => ['required', 'numeric'],
            'category' => ['required', 'numeric', $this->checkGivenidInTable('categories')],
            'author' => ['required', 'numeric', $this->checkGivenidInTable('authors')],
            'genre' => ['required', 'numeric', $this->checkGivenidInTable('genres')],
            'sale_price'=> ['required', 'numeric'],
            'description' => ['required', 'string'],
            'status' => ['required', Rule::in(['Active', 'Inactive', 'Pending'])],
            'image'=>['sometimes', $this->validateImageMimes()],
            'publication' => ['sometimes', $this->checkGivenidInTable('publications')],
            'published_date' =>['required', 'date', 'date_format:Y-m-d']
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
            'published_date.date_format'=> 'Published date must in year-month-day format'
        ];
    }


}
