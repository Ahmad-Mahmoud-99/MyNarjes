<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewFormRequest extends FormRequest
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
            'analysis_name'=>'required|unique:analysis,analysis_name'.$this->id,
            'price'=> 'required|numeric|int',
            'group'=> 'required',
            'max_normal'=>'required|numeric|array|min:1',
            'min_normal'=>'required|numeric|array|min:1',
            'input'=>'required|string|array|min:1',
            'max_normail.max'=>'required',
            'min_normail.min'=>'required',
            'input.input'=>'required',
        ];
    }
    public function messages()
    {
        return[
        'analysis_name.required'=> 'هذا الحقل مطلوب',
        'string'=>'يجب ادخال نص',
        'numeric'=>'يجب ادخال رقم',
        'required'=>'هذا الحقل مطلوب',
        'unique'=>'هذا الاسم موجود من قبل',
        'int'=>'يجب أن يكون رقم صحيح',
   ];
    }
}
