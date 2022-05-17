<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubcategoryRequest extends FormRequest
{
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
            'title'       =>  ['required' , 'string' , 'max:55' , Rule::unique('subcategories', 'title')->ignore($this->subcategory)],
            'category_id' =>  ['required' , 'numeric'],
        ];
    }
}
