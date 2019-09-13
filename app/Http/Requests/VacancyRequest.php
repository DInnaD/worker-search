<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
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

public function rules()
    {
        
        return [
            'vacancy_name'  =>  'required|min:1|max:32|string',            
            'workers_amount' => 'min:1|max:2147483647|position.input_integer|integer',
            'salary' => 'min:1|max:2147483647|position.input_integer|integer',
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
            'vacancy_name'  =>  'Position Name',           
            'workers_amount' => 'Position Number Of Emploees',
            'organization_id' => 'Creator Company'
            'salary' => 'Position Salary',
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
            'vacancy_name'  =>  'The :attribute value is required:input is not between 1:min - 32:max.',           
            'position.input_string' => 'The :input is not between 1:min - 32:max.',
            'position.input_integer' => 'The :input is not between 1:min - 2147483647:max',
        ];
    }
}
