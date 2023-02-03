<?php

namespace App\Http\Requests\Shipment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
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
            'User_id' => 'required|exists:users,id',
            'Address_id' => 'required|exists:shipments,id',
            'First_Name' => 'required|alpha',
            'Last_Name'  => 'required|alpha',
            'Email'      => 'required|exists:users,email',
            'Phone_No'   => 'required|numeric|min:11',
            'Address'    => 'required',
        ];
    }
    public function messages()
    {
        return [
            'First_Name.alpha' => 'Only Alphabetic Characters',
            'Last_Name.alpha'  => 'Only Alphabetic Characters',
            'Email.exists'     => 'Email Do not Exists in Our Record',
            'Phone_No.min'     => 'Phone Number Must be Contain 11 Digits',
            'Address.required' => 'Address is Required',
            'Address.exists' => 'Address is Not in Our Record',
        ];
    }
}
