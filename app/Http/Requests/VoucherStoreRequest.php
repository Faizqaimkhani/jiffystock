<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoucherStoreRequest extends FormRequest
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
          'name' => 'required',
          'discounted_price' => 'required|numeric',
          'user_id' => 'required|numeric',
          'times_to_use' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
          'user_id.required' => 'Something went wrong.',
          'user_id.numeric' => 'Something went wrong.',
        ];
    }


}
