<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\traits\ValidationRuleTrait;

class BookTypeRequest extends FormRequest
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
        $unique = Rule::unique('book_types', 'title');

        if(Route::getCurrentRoute()->getName() === 'admin.book_types.update'){
            $unique = Rule::unique('book_types', 'title')->ignore($this->book_type->id, 'id');
        }

        return [
                'title' => ['required','min:2','max:50', $this->regexAlphabetWithSpace(), $unique],
            ];
    }
}
