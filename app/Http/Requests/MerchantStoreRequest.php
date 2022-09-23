<?php

namespace App\Http\Requests;

use App\Enums\VatStatus;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class MerchantStoreRequest extends FormRequest
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
            'name'           => ['required'],
            'shipping_cost'  => ['required','integer','min:1'],
            'vat_status'     => ['required', new EnumValue(VatStatus::class, false)],
            'vat_percentage' => [
                  'required_if:vat_status,'.VatStatus::FROM_PRICE.'',
                  'nullable',
                  'integer',
                  'min:1',
                  'max:100'
                ]
        ];
    }
}
