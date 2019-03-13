<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PresonalRequest extends FormRequest
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
    public function rules(Request $request)
    {

        return [
            'name'=>'required',
            'email'=>'required|email|max:255|unique:users',
            'phone'=>'required|min:10',
            'country_id'=>'required',
            'city_id'=>'required',
            'password'=> 'required|min:6',
            'house'=>'required',
        ];
    }
}
