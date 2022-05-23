<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
            'title'    =>  ['required' , 'string' , 'max:55' , Rule::unique('categories', 'title')->ignore($this->category)],
            'icon'     =>  ['nullable' , 'mimes:svg' , 'max:2048'],
            'img'      =>  ['nullable' , 'mimes:jpeg,png,jpg' , 'max:2048'],
        ];
    }
}
