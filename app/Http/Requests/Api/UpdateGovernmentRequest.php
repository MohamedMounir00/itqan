<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGovernmentRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,'. $this->user()->id,
            'password' => 'nullable|min:6',
            'phone'=>'required|min:10|unique:users,phone,'. $this->user()->id,
            'country_id'=>'required',
            'city_id'=>'required',
            'minstry_id'=>'required',
            'name_of_head'=>'required',
        ];
    }
}
