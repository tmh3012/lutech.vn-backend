<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'user_id' => ['required'],
            'job_title' => ['required'],
            "job_description" => ['nullable'],
            "job_requirement" => ['nullable'],
            "job_benefit" => ['nullable'],
            "min_salary" => ['nullable'],
            "max_salary" => ['nullable', 'gte:min_salary'],
            "start_date" => ['nullable', 'date'],
            "end_date" => ['nullable', 'date', 'after:start_date'],
            "number_applicants" => ['nullable'],
            "slug" => ['nullable'],
            "site" => ['required'],
        ];
    }
}
