<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'desc'=>'required',
            'category_id'=>'required',
            'time_id'=>'required',
            'date_en'=>'required',
            'date_ar'=>'required',
            'address_id'=>'required',
            'express'=>'required',
        ];
    }
}
