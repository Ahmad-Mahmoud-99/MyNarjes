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
            'email'=>'required|email|nullable',//unique
            'address'=>'required',
            'password'=>'required',
            'username'=>'required',//unique
            'phone'=>'required|min:10|max:14|nullable',//unique

        ];
        
    }
    public function messages()
    {
        return [
            
           'email'=>'يجب اخال الايميل بالصورة الصحيحة',
            'required'=>'هذا الحقل مطلوب ',
             'phone.min'=>' رقم الجوال مكون من 10 منازل على الأقل',
             'phone.max'=>'رقم الجوال مكون من 14 منازل على الأكثر',
             'string'=>'يجب ادخال نص',
             'numeric'=>'يجب ادخال رقم',

        ];
    }
}
