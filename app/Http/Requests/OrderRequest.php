<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
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
            'user_id'      =>  [ 'required' , 'numeric' ],
            'address'      =>  [ 'required' , 'string' , 'max:250' ],
            'phone'        =>  [ 'required' , 'string' , 'max:55' ],
            'product_id'   =>  [ 'required' , 'array' ],
            'product_id.*' =>  [ 'required' , 'numeric' , 'distinct' ],
            'quantity'     =>  [ 'required' , 'array'],
            'quantity.*'   =>  [ 'required' , 'numeric' , 'digits_between:1,2'],
            'status'       =>  [ 'required' , 'string' , 'max:1'],
        ];
    }
}
