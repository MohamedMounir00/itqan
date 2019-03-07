<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class TechnicalRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|max:255|unique:users',
            'phone'=>'required|min:15',
            'password'=> 'required|min:6',
            'identification'   => 'required|min:15|not_in:0',
            'category_id'      => 'required',
            'country_id'      => 'required',
        ];
    }
}
