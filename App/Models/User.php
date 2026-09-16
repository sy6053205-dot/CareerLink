<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Job;



class User extends Authenticatable
{
    protected $fillable=[
        'name','email','password','role'];

    protected $hidden=[
        'password', 'remember_token'
    ];

    public function employeeProfile(): HasOne
{
    return $this->hasOne(EmployeeProfile::class);
}

public function employerProfile(): HasOne
{
    return $this->hasOne(EmployerProfile::class);
}

public function jobPostings(): HasMany
{
    return $this->hasMany(Job::class, 'employer_id');
}

public function applications(): HasMany
{
    return $this->hasMany(Application::class, 'employee_id');
}

public function posts(): HasMany
{
    return $this->hasMany(Post::class);
}

public function likes(): HasMany
{
    return $this->hasMany(Like::class);
}

public function comments(): HasMany
{
    return $this->hasMany(Comment::class);
}
public function companies()
{
    return $this->hasMany(Company::class);
}
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
