<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyOtpRequest extends FormRequest
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
            'email' => 'required|exists:users,email',
            'otp' => 'required|exists:users,otp'
        ];
    }
    public function messages()
    {
        return [
            'email.exists' => 'Email Not Registered',
            'otp.exists' => 'OTP Not Matched'
        ];
    }
}
