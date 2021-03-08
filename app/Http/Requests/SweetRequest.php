<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SweetRequest extends FormRequest
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
            'name' => 'required | max:10',
            'category_id' => 'required',
            'stock' => 'required',
            'introduction' => 'required | max:60',
            'price' => 'required',
            'allergy' => 'required',
            'path' => 'required' | 'file' | 'image' | 'mimes:jpeg,png'
        ];
    }
}
