<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class AdminStoreSupplier extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && auth()->user()->usertype == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
     {
         return [
           'name' => 'required|string|max:60',
           'email' => 'required|string|email|max:60|unique:customers,email',
           'password' => ['required', 'confirmed', Password::min(8)
                                                               ->mixedCase()
                                                               ->letters()
                                                               ->numbers()
                                                               ->symbols(),],
           'company' => 'required|max:50|min:3',
           'company_license' => 'required',
           'contact_number' => 'required|numeric',
           'country' => 'required|integer',
           'city' => 'required|integer',
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
            'country.integer' => 'Please Select a Country ',
            'city.integer' => 'Please Select a City ',
          ];
      }
}
