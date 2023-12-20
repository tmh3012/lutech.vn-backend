<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecruitmentResource extends JsonResource
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
            'post_id' => $this->post_id,
            'cover_letter' => $this->cover_letter,
            'name' => $this->name,
            "phone" => $this->phone,
            "email" => $this->email,
            "file" => $this->file,
            "post_title" => $this->post->job_title,
        ];
    }
}
