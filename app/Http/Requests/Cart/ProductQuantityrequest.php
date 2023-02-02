<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class ProductQuantityrequest extends FormRequest
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
            'product_id' => 'required|exists:carts,product_id',
            'quantity'   => 'required|min:1'
        ];
    }

    public function messages()
    {
        return [
            'product_id.exists' => 'Product is not in Cart',
        ];
    }
}
