<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'job_title',
        'status',
        "district",
        "city",
        "remote",
        "can_parttime",
        "min_salary",
        "max_salary",
        "currency_salary",
        "job_description",
        "job_requirement",
        "job_benefit",
        "start_date",
        "end_date",
        "number_applicants",
        "slug",
    ];
}
