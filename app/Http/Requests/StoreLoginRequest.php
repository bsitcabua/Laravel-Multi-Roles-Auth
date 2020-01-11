<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class StoreLoginRequest extends FormRequest
{
    public $validator = null;

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'email'     => 'required|email',
            'password'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => 'Email is required',
            'email.email'       => 'Email is invalid',
            'password.required' => 'Password is required',
        ];
    }

    protected function failedValidation($validator)
    {
        $this->validator = $validator;
    }
}
