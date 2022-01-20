<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ClearanceRegisterRequest extends FormRequest
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
        'clearance_name' => 'required|string|max:60',
        'file' => 'required|mimes:jpeg,jpg,png,pdf',
        'clearance_email' => 'required|string|email|max:60|unique:users,email',
        'clearance_password' => ['required', 'confirmed', Password::min(8)
                                                            ->mixedCase()
                                                            ->letters()
                                                            ->numbers()
                                                            ->symbols(),],
        'clearance_company' => 'required|max:50|min:3',
        'clearance_company_license' => 'required',
        'clearance_contact_number' => 'required|numeric',
        'clearance_country' => 'required|integer',
        'clearance_city' => 'required|integer',
        'terms_conditions' => 'accepted',
        'clearance' => 'required',
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
         'clearance_country.integer' => 'Please Select a Country ',
         'clearance_city.integer' => 'Please Select a City ',
       ];
   }
}
