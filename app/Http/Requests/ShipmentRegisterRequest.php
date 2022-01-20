<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ShipmentRegisterRequest extends FormRequest
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
          'shipment_name' => 'required|string|max:60',
          'file' => 'required|image|mimes:jpeg,jpg,png,pdf',
          'shipment_email' => 'required|string|email|max:60|unique:users,email',
          'shipment_password' => ['required', 'confirmed', Password::min(8)
                                                              ->mixedCase()
                                                              ->letters()
                                                              ->numbers()
                                                              ->symbols(),],
          'shipment_company' => 'required|max:50|min:3',
          'shipment_company_license' => 'required',
          'shipment_contact_number' => 'required|numeric',
          'shipment_country' => 'required|integer',
          'shipment_city' => 'required|integer',
          'terms_conditions' => 'accepted',
          'shipment' => 'required',
          'captcha' => 'required|captcha'
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
          'shipment_country.integer' => 'Please Select a Country ',
          'shipment_city.integer' => 'Please Select a City ',
        ];
    }
}
