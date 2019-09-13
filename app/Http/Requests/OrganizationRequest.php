<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
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
            'title'  =>  'required|min:1|max:32|string', 
            'country' => 'min:1|max:32|position.input_string|string',
            'city' => 'min:1|max:32|position.input_string|string',
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
            'title'  =>  'Position Name', 
            'country' => 'Position Country',
            'city' => 'Position City',           
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
            'title'  =>  'The :attribute value is required:input is not between 1:min - 32:max.',           
            'position.input_string' => 'The :input is not between 1:min - 32:max.',
            'position.input_integer' => 'The :input is not between 1:min - 2147483647:max',
        ];
    }
    
}
