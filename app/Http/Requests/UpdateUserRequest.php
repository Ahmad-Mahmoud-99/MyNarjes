<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'f_name'=>'required|string',
            'm_name'=>'required|string',
            'l_name'=>'required|string',
            'role_name'=>'required',
            'age'=>'required|numeric',
            'email'=>'required|email|unique:user,email,'.$this->id,
            'address'=>'required',
            'username'=>'required|unique:user,username,'.$this->id,
            'phone'=>'required|digits_between:10,14|unique:user,phone,'.$this->id,
            'status'=>'required',
        ];
    }
    public function messages()
    {
        return [
            
            'email'=>'يجب ادخال الايميل بالصورة الصحيحة',
            'required'=>'هذا الحقل مطلوب ',
             'string'=>'يجب ادخال نص',
             'numeric'=>'يجب ادخال رقم',
             'email.unique'=>'البريد الاكتروني مستخدم من قبل',
             'phone.unique'=>' رقم الجوال مستخدم من قبل',
             'username.unique'=>'اسم المستخدم مستخدم من قبل',
             'phone.digits_between'=>'رقم الجوال مكون من 10 الى 14 رقم',
        ];
    }
}
