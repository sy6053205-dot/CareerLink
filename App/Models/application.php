<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    protected $fillable = [
        'job_posting_id',
        'employee_id',
        'status',
    ];

    public function jobPosting(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'job_posting_id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}