<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Lesson;
use App\Models\User;
use Carbon\Carbon;
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
 * @package App\Models\Base
 */
class UserLesson extends Model
{
	protected $table = 'user_lessons';

	protected $casts = [
		'user_id' => 'int',
		'lesson_id' => 'int',
		'started_at' => 'datetime',
		'status' => 'int',
		'time' => 'int',
		'grade' => 'int'
	];

	public function lesson()
	{
		return $this->belongsTo(Lesson::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}