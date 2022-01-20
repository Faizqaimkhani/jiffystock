<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
          'title' => 'required|max:250|min:8',
          'description' => 'required|min:8',
          'type' => 'required|max:8',
          'product_id' => 'required|max:8',
          'screenshots.*' => 'file|image|mimes:jpg,jpeg,png,gif',
        ];
    }

    public function messages()
    {
      return [
        'type.required' => 'Something Went Wrong, refresh the page and try again',
        'type.max' => 'Something Went Wrong, refresh the page and try again',
        'product_id.required' => 'Something Went Wrong, refresh the page and try again',
        'product_id.max' => 'Something Went Wrong, refresh the page and try again',
      ];
    }
}
