<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutomotiveRequest extends FormRequest
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
            'owner' => 'required|max:100',
            'phone' => 'required|max:100',
            'title' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'status' => 'required',
            'sale_price' => 'required',
            'description' => 'required',
            'year' => 'required',
            'mileage' => 'required',
            'gear' => 'required|max:100',
            'fuel' => 'required|max:100',
            'zipcode' => 'required|min:8|max:13',
            'street' => 'required|min:3|max:100',
            'number' => 'required|min:1|max:100',
            'complement' => 'max:100',
            'neighborhood' => 'max:100',
            'state' => 'required|min:2|max:3',
            'city' => 'required|min:2|max:100',
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg,webp|max:1024|dimensions:max_width=1800,max_height=1800'
        ];
    }
}
