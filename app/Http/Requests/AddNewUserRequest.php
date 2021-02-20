<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewUserRequest extends FormRequest
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
            //
            'f_name'=>'required|string',
            'm_name'=>'required|string',
            'l_name'=>'required|string',
            'start_date'=>'required',
            'role_name'=>'required',
            'age'=>'required|numeric',
            'email'=>'required|email|unique:user,email,'.$this->id,
            'address'=>'required',
            'password'=>'required',
            'username'=>'required|unique:user,username,'.$this->id,
            'phone'=>'required|digits_between:10,14|unique:user,phone,'.$this->id,

        ];
        
    }
    public function messages()
    {
        return [
            
           'email'=>'يجب اخال الايميل بالصورة الصحيحة',
            'required'=>'هذا الحقل مطلوب ',
            //  'phone.min'=>' رقم الجوال مكون من 10 منازل على الأقل',
            //  'phone.max'=>'رقم الجوال مكون من 14 منازل على الأكثر',
             'string'=>'يجب ادخال نص',
             'numeric'=>'يجب ادخال رقم',
             'email.unique'=>'البريد الاكتروني مستخدم من قبل',
             'phone.unique'=>' رقم الجوال مستخدم من قبل',
             'username.unique'=>'اسم المستخدم مستخدم من قبل',
             'phone.digits_between'=>'رقم الجوال مكون من 10 الى 14 رقم',

        ];
    }
}
