<?php

namespace App\Http\Requests;

use App\Enums\UserRolesEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'unique:users'
            ],
            'password' => [
                'required',
                'min:8'
            ],
            'role' => [
                'nullable',
                Rule::in(UserRolesEnum::getValues())
            ],
            'gender' => [
                'required',
                'boolean',
            ],
            'avatar' => [
                'nullable',
                'string',
            ],
            'position_id' => [
                'nullable',
                'exists:positions,id',
                'alpha_num:ascii',
            ],
            'team' => [
                'nullable',
                'array',
            ],
        ];
    }
}
