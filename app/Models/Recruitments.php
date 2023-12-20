<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recruitments extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'cover_letter',
        'name',
        "phone",
        "email",
        "address",
        "file",
    ];

    protected function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
