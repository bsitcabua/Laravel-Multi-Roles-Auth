<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class StoreContactRequest extends FormRequest
{
    public $validator = null;

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'contact_no'    => 'required|max:100',
            'email'         => 'required|email|max:255',
            'address'       => 'max:255',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'   => 'First name is required',
            'first_name.max'        => 'First name cannot be longer than 255 characters',
            'last_name.required'    => 'Last name is required',
            'last_name.max'         => 'Last name cannot be longer than 255 characters',
            'contact_no.required'   => 'Contact no. is required',
            'contact_no.max'        => 'Contact no. cannot be longer than 255 characters',
            'email.required'        => 'Email is required',
            'email.email'           => 'Email is invalid',
            'email.max'             => 'Email cannot be longer than 255 characters',
            'address.max'           => 'Address cannot be longer than 255 characters'
        ];
    }

    protected function failedValidation($validator)
    {
        $this->validator = $validator;
    }
}
