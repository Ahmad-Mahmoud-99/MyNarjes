<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPatientRequest extends FormRequest
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
            'f_name'=>'required|string',
            'm_name'=>'required|string',
            'l_name'=>'required|string',
            'birthday'=>'required',
            'gender'=>'required',
            'age'=>'required|numeric',
            'email'=>'email',
            'address'=>'required',
            'phone'=>'min:10|max:14',

        ];
    }
    public function messages()
    {
        return [
            'f_name.required'=>'هذا الحقل مطلوب ',
            'm_name.required'=>'هذا الحقل مطلوب ',
            'l_name.required'=>'هذا الحقل مطلوب ',
            'gender.required'=>'هذا الحقل مطلوب ',
            'birthday.required'=>'هذا الحقل مطلوب ',
            'age.required'=>'هذا الحقل مطلوب ',
            'address.required'=>'هذا الحقل مطلوب ',
             'phone.min'=>' رقم الجوال مكون من 10 منازل على الأقل',
             'phone.max'=>'رقم الجوال مكون من 14 منازل على الأكثر',
             'string'=>'يجب ادخال نص',
             'numeric'=>'يجب ادخال رقم',
        ];
    }
}
