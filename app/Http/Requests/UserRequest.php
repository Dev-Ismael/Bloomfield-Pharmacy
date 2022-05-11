<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'                 =>  ['required', 'string', 'max:55'],
            'first_name'           =>  ['nullable', 'string', 'max:55'],
            'last_name'            =>  ['nullable', 'string', 'max:55'],
            'email'                =>  ['required', 'string', 'email', 'max:55', 'unique:users'],
            'email_2'              =>  ['nullable', 'string', 'email', 'max:55', 'unique:users'],
            'password'             =>  ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation'=>  ['required', 'string', 'min:8'],
            'phone'                =>  ['nullable', 'string', 'max:55'],
            'phone_2'              =>  ['nullable', 'string', 'max:55'],
            'state'                =>  ['nullable', 'string', 'max:55'],
            'address'              =>  ['nullable', 'string', 'max:255'],
            'address_2'            =>  ['nullable', 'string', 'max:255'],
            'address_3'            =>  ['nullable', 'string', 'max:255'],
            'role'                 =>  ['required', 'string', 'max:1'],
        ];
    }
}
