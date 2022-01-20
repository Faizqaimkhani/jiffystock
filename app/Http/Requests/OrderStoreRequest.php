<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guard('web')->user()->usertype == 'user';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'contact_no' => 'required|numeric',
            'country' => 'required|numeric',
            'city' => 'required|numeric',
            'zip_code' => 'required|numeric',
            'address' => 'required',
            'product_quantity' => 'required|numeric',
            'shipping_price' => 'required|numeric',
        ];
    }
}
