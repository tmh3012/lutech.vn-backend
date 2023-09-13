<?php

namespace App\Http\Requests;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\ResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
{
    use ResponseTrait;
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
            'email' => [
                'required',
                'email',
                Rule::exists('users', 'email')
            ],
            'password' => [
                'required',
                'min:8'
            ],
        ];
    }
    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        $response = $this->errorResponse($errors->messages(), null, 422);
        throw new HttpResponseException($response);
    }
}
