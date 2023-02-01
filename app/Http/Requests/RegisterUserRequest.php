<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:3|max:10'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'User Name is Required',
            'email.required' => 'Email is Required',
            'email.unique' => 'Email Already Registered',
            'password.max' => 'Password is greater than 10',
        ];
    }
}
