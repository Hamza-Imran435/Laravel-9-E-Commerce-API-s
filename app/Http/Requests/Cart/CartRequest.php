<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            // 'customer_id' => 'required|exists:users,id',
            'product_id'  => 'required|exists:products,id',
            'total_price' => 'required',
            'quantity'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            // 'customer_id.exists'  => 'Customer Do not Exists',
            'product_id'          => 'Product Do not Found',
        ];
    }
}
