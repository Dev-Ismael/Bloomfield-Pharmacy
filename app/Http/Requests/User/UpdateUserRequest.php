<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'email'                =>  ['required', 'string', 'email', 'max:55', Rule::unique('users', 'email')->ignore($this->user)],
            'email_2'              =>  ['nullable', 'string', 'email', 'max:55', Rule::unique('users', 'email')->ignore($this->user)],
            'password'             =>  ['nullable', 'string', 'min:8', 'confirmed'],
            'password_confirmation'=>  ['nullable', 'string', 'min:8'],
            'phone'                =>  ['nullable', 'array', 'max:100'],
            'phone.*'              =>  ['nullable', 'string', 'max:45'],
            'state'                =>  ['nullable', 'string', 'max:55'],
            'address'              =>  ['nullable', 'array', 'max:750'],
            'address.*'            =>  ['nullable', 'string', 'max:240'],
            'role'                 =>  ['required', 'string', 'max:1'],
        ];
    }
}
