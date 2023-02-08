<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerNewPasswordRequest extends FormRequest
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
            'otp' => 'required|exists:customers,otp',
            'new_password' => 'required|max:8',
            'confirm_password' => 'required_with:new_password|same:new_password'
        ];
    }

    public function messages()
    {
        return[
            'otp.exists' => 'OTP Do Not Matched',
            'new_password.required' => 'New Password Field is Required',
            'confirm_password.same' => 'Password Do Not Matched',
        ];
    }
}
