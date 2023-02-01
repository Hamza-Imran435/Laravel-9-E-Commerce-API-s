<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|unique:products,name',
            'price' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_id.exists' => 'Category Does Not Exist',
            'name.required' => 'New Password Field is Required',
            'price.required' => 'Price Field is Required',
            'description.required' => 'Description Field is Required',
        ];
    }
}
