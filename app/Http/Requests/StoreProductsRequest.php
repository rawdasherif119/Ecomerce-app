<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsRequest extends FormRequest
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
            'products'               => ['required','array'],
            'products.*.name'        => ['required', 'max:100'],
            'products.*.description' => ['required', 'max:1000'],
            'products.*.price'       => ['required', 'integer', 'min:1'],
        ];
    }
}
