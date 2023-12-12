<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'start_date' => 'datetime:d-m-Y',
    ];

    protected $dateFormat = "d-m-Y";

    protected $fillable = [
        'user_id',
        'title',
        'job_title',
        "job_description",
        "job_requirement",
        "job_benefit",
        "min_salary",
        'max_salary',
        'start_date',
        'end_date',
        "number_applicants",
        "slug",
        "site",
    ];

    protected function startDate(): Attribute
    {
        return Attribute::make(
          get: fn($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }
}