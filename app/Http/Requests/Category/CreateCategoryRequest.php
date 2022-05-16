<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCategoryRequest extends FormRequest
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
            'icon'     =>  ['required' , 'mimes:svg' , 'max:2048'],
        ];
    }
}