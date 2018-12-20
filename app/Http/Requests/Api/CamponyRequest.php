<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CamponyRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|max:255|unique:users',
            //'phone'=>'required',
            'country_id'=>'required',
            'city_id'=>'required',
            'password'=> 'required',
            'company_id'=>'required',
            'name_of_head'=>'required',
        ];
    }
}
