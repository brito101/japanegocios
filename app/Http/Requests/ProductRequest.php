<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'required|max:100',
            'status' => 'required',
            'sale_price' => 'required',
            'description' => 'required',
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg,webp|max:1024|dimensions:max_width=1800,max_height=1800'
        ];
    }
}
