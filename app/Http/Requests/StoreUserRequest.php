<?php

namespace App\Http\Requests;

use App\Enums\UserType;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'                  => ['required','max:100'],
            'email'                 => ['required', 'string', 'email:filter', 'unique:users,email,Null,id'],
            'password'              => ['required', 'min:8'],
            'password_confirmation' => ['required', 'same:password'],
            'type'                  => ['required', new EnumValue(UserType::class, false)],
        ];
    }
}