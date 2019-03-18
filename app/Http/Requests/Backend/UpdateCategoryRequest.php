<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class UpdateCategoryRequest extends FormRequest
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
                'name.ar'=>'required|min:3|max:25',
                'name.en'=>'required|min:3|max:25',
                'system_clocks'=>'required',
                'price'=>'required|not_in:0',
                'price_emergency'=>'required|not_in:0',
            ];



    }
}
