<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserLesson
 *
 * @property int $id
 * @property int $user_id
 * @property int $lesson_id
 * @property Carbon|null $started_at
 * @property int|null $status
 * @property int|null $time
 * @property int|null $grade
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Lesson $lesson
 * @property User $user
 *
 * @package App\Models
 */
class UserLesson extends Model {
    use HasFactory;
    protected $table = 'user_lessons';

    protected $casts = [
        'user_id' => 'int',
        'lesson_id' => 'int',
        'started_at' => 'datetime',
        'status' => 'int',
        'time' => 'int',
        'grade' => 'int'
    ];

    protected $fillable = [
        'user_id',
        'lesson_id',
        'started_at',
        'status',
        'time',
        'grade'
    ];


    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
