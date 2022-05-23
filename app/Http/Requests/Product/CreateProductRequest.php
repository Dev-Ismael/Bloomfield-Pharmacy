<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProductRequest extends FormRequest
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
            'title'           =>  ['required' , 'string' , 'max:55' , Rule::unique('products', 'title')->ignore($this->product)],
            'subcategory_id'  =>  ['required' , 'numeric' ],
            'price'           =>  ['required' , 'numeric' , 'digits_between:1,6'],
            'quantity'        =>  ['required' , 'numeric' , 'digits_between:1,6'],
            'has_offer'       =>  ['required' , 'string' , 'max:1' ],
            'offer_percentage'=>  ['nullable' , 'numeric' , 'digits_between:1,2' ],
            // 'final_price'    // not at inputs form fields
            'brand'           =>  ['required' , 'string' , 'max:55'],
            'measurement'     =>  ['required' , 'string' , 'max:55'],
            'description'     =>  ['required' , 'string' , 'max:1000'],
            'img'             =>  ['required' , 'mimes:jpeg,png,jpg' , 'max:2048'],
        ];
    }
}
