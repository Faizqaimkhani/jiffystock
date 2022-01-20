<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShipmentServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      return auth()->guard('shipment_user')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
        'title' => 'required|string|min:3|max:255',
        'html_data' => 'required',
        'thumbnail' => 'sometimes|image|mimes:jpeg,jpg,png,gif||max:2048',
      ];
    }
}
