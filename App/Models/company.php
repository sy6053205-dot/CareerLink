<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'logo',
        'location',
        'description',
        'website',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   
    public function jobPostings()
    {
        return $this->hasMany(Job::class);
    }
}