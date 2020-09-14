<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
            "fullname" => "required|max:100",
            "address" => "required|max:200",
            "gender" => "required",
            "avatar" => "image|mimes:jpg,png,jpeg,gif,svg|max:10000",
            "department_id" => "required",
            "birthday" => "required",
        ];
    }


    public function messages()
    {
        return [
            "fullname.required" => trans('error.required'),
            "fullname.max" => __('error.over_leng', ['value'=>100]),
            "address.required" => trans('error.required'),
            "address.max" => __('error.over_leng', ['value'=>200]),
            "gender.required" => trans('error.required'),
            "avatar.image" => trans('error.be_image'),
            "avatar.mimes" => trans('error.image_end'),
            "avatar.max" => trans('error.image_size'),
            "department_id.required" => trans('error.required'),
            "birthday.required" => trans('error.required'),
        ];
    }
}
