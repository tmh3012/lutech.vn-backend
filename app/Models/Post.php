<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $casts = [
        'start_date' => 'date:Y-m-d',
        'end_date' => 'date:Y-m-d',
    ];

    protected $dateFormat = "Y-m-d";

    protected $fillable = [
        'user_id',
        'job_title',
        'job_position',
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
          get: fn($value) => Carbon::parse($value)->format('d/m/Y'),
        );
    }

    protected function endDate(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->format('d/m/Y'),
        );
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'job_title'
            ]
        ];
    }
}
