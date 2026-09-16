<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    protected $table = 'job_postings';

    protected $fillable = [
        'employer_id',
        'company_id',
        'category_id',
        'title',
        'description',
        'requirements',
        'status',
        'location',
        'work_mode',
        'job_type',
        'salary_min',
        'salary_max'
    ];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'job_posting_id');
    }
    public function company()
{
    return $this->belongsTo(Company::class);
}

public function category()
{
    return $this->belongsTo(Category::class);
}
}