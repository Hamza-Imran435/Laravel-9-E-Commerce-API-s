<?php

namespace App\Http\Requests\Shipment;

use Illuminate\Foundation\Http\FormRequest;

class DeleteAddressRequest extends FormRequest
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
            'Address_id' => 'required|exists:shipments,id',
            'User_id'    => 'required|exists:users,id'
        ];
    }
    public function messages()
    {
        return [
            'Address_id.exists' => 'Address is Not in Our Record',
            'User_id.exists'    => 'User Id Not Exists',
        ];
    }
}
