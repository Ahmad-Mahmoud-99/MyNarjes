<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updatePriceRequest extends FormRequest
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
            'price'=>'required|numeric|int',
        ];
    }
    public function messages()
    {
        return [
            //
        'required'=>'هذا الحقل مطلوب',
         'numeric'=>'هذا الحقل أرقام فقط',
         'int'=>'يجب أن يكون رقم صحيح',

        ];
    }
}
