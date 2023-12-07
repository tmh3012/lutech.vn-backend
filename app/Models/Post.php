<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

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
}
