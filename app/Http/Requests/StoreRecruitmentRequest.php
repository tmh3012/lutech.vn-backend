<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecruitmentRequest extends FormRequest
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
            'post_id' => ['required'],
            'cover_letter' => ['required'],
            'name' => ['required'],
            "phone" => ['nullable'],
            "email" => ['nullable'],
            "address" => ['nullable'],
            "file" => ['nullable'],
        ];
    }
}