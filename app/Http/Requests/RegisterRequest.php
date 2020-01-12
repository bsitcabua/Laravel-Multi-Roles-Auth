<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class RegisterRequest extends FormRequest
{
    public $validator = null;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name'            => 'required|max:255',
            'last_name'             => 'required|max:255',
            'contact_no'            => 'required||unique:users,contact_no|max:100',
            'email'                 => 'required|email|unique:users,email|max:100',
            'password'              => 'required|confirmed|min:8|max:50',
            'password_confirmation' => 'required',
            // 'address'       => 'max:255',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'               => 'First name is required',
            'first_name.max'                    => 'First name cannot be longer than 255 characters',

            'last_name.required'                => 'Last name is required',
            'last_name.max'                     => 'Last name cannot be longer than 255 characters',

            'contact_no.required'               => 'Contact no. is required',
            'contact_no.max'                    => 'Contact no. cannot be longer than 255 characters',
            'contact_no.unique'                 => 'Contact no. has already been taken',

            'email.required'                    => 'Email is required',
            'email.email'                       => 'Email is invalid',
            'email.max'                         => 'Email cannot be longer than 255 characters',
            'email.unique'                      => 'Email address has already been taken',

            'password.required'                 => 'Password is required',
            'password.min'                      => 'Password at least 8 characters long',
            'password.max'                      => 'Password cannot be longer than 50 characters',
            'password.confirmed'                => 'Your password and confirmation password do not match',
            
            'password_confirmation.required'    => 'Confirmation password is required',
        ];
    }

    protected function failedValidation($validator)
    {
        $this->validator = $validator;
    }
}
