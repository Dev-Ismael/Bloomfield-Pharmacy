<?php

namespace App\Http\Requests\Prescription;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatePrescriptionRequest extends FormRequest
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
            'user_id'           =>  ['required' , 'numeric' ],
            'age'               =>  ['nullable' , 'string' , 'max:55'],
            'gender'            =>  ['nullable' , 'string' , 'max:55'],
            'medicine'          =>  ['required' , 'array' ,  'max:1000'],
            'medicine.*'        =>  ['required' , 'string' , 'distinct'],
            'additional_details'=>  ['nullable' , 'string' , 'max:1000'],
            'validation'        =>  ['required' , 'string' , 'max:1'],
            'schedule_orders'   =>  ['required' , 'string' , 'max:1'],
            'img'               =>  ['required' , 'mimes:jpeg,png,jpg' , 'max:2048'],
        ];
    }
}
