<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
        return [
            'email' =>  'required|email|unique:users|string',
            'password'  =>  'required|string|min:6|max:20|confirmed',
            'first_name'  =>  'min:1|max:20|user.input_string|string',
            'last_name' => 'min:1|max:40|user.input_string|string',
            'country' => 'min:1|max:100|user.input_string|string',
            'city' => 'min:1|max:100|user.input_string|string',
            'phone' => 'min:1|max:30|user.input_string|string',
            'role' => 'min:1|max:20|user.input_string|string',//pivot
        ];
    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'email' =>  'User Email',
            'password'  =>  'User Password',
            'first_name'  =>  'User Name',
            'last_name' => 'User Surname',
            'country' => 'User Country',
            'city' => 'User City',
            'phone' => 'User Phone Number',
            'role' => 'User Role',//pivot
            'user_id' => 'Of User'
        ];
    }

   
    /*
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name'  =>  'The :attribute value is required:input is not between 1:min - 20:max.', 
            'password' => 'The :input is not between 6:min - 20:max.',
            'user.input_string' => 'The :input is not between 1:min - 20:max or 30:max or 40:max or 100:max.',
        ];
    }
}
