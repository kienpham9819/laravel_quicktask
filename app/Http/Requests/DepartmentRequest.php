<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DepartmentRequest extends FormRequest
{
   
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
             "name" => [
                "required",
                "max:100",
                Rule::unique('departments', 'name')->ignore($this->department),
             ],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => trans('error.required'),
            "name.max" => __('error.over_leng',['value'=>100]),
            "name.unique" => trans('error.unique'),
        ];
    }
}
