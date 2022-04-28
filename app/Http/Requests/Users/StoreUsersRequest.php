<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required|min:5|max:55' ,
            'first_name'  => 'nullable|min:5|max:55' ,
            'last_name'   => 'nullable|min:5|max:55' ,
            'password'    => 'required|min:5|max:55' ,
            'email'       => 'required|email|min:5|max:55|unique:users' ,
            'email_2'     => 'nullable|email|min:5|max:55|unique:users' ,
            'phone'       => 'nullable|max:55' ,
            'phone_2'     => 'nullable|max:55' ,
            'state'       => 'nullable|max:55' ,
            'address'     => 'nullable|max:255' ,
            'address_2'   => 'nullable|max:255' ,
            'address_3'   => 'nullable|max:255' ,
            'role'        => 'required|max:1' ,
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
