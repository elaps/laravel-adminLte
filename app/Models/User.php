<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function companies() {
        return $this->hasMany(Company::class);
    }

    public function lessons() {
        return $this->belongsToMany(Lesson::class, 'user_lessons')
            ->withPivot('id', 'started_at', 'status', 'time', 'grade')
            ->withTimestamps();
    }

    public function user_tasks() {
        return $this->hasMany(UserTask::class);
    }

    public function tracks() {
        return $this->belongsToMany(Track::class, 'user_tracks')
            ->withPivot('id', 'started_at', 'finished_at', 'done_percent', 'status')
            ->withTimestamps();
    }
}
