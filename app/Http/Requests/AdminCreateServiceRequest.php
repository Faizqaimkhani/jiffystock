<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateServiceRequest extends FormRequest
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
        'title' => 'required|string|min:3|max:255',
        'html_data' => 'required',
        'thumbnail' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
      ];
    }
}
