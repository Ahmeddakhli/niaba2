<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrailRequest extends FormRequest
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
            'national_number' => 'required|numeric|max:99999999999999',
            'complained' => 'required|string|max:255',
            'phone_number' => 'required|numeric',
            'complainer_name'=>'required|string|max:255',

          //  'procedure' => 'required',
          //  'behave' => 'required',
         //   'note' => 'required',
        
            
        ];

    }

    public function messages()
{
    return [
        'national_number.required' => 'يجب ادخال الرقم القومى المكون من14 رقم',
        'national_number.max' => 'يجب ادخال الرقم القومى 14 رقم فقط',
        'complained.required' => ' بجب ادخال اسم الجهه المشكو بها',
        'phone_number.required' => ' بجب ادخال رقم الموبيل ',
        'filenames.required' => ' بجب اختيار صوره او اكثر',
        'complainer_name.required'=>'بجب ادخال اسم الشاكى',

    ];
}
}
