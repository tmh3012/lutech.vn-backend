<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'job_title' => $this->job_title,
            "job_description" => $this->job_description,
            "job_requirement" => $this->job_requirement,
            "job_benefit" => $this->job_benefit,
            'min_salary' => $this->min_salary,
            'max_salary' => $this->max_salary,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            "number_applicants" => $this->number_applicants,
            "slug" => $this->slug,
            "site" => $this->site,
        ];
    }
}
