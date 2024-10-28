<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Track;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lesson
 * 
 * @property int $id
 * @property uuid $uuid
 * @property int $track_id
 * @property int|null $parent_id
 * @property string $title
 * @property bool $is_active
 * @property bool $is_need_parent
 * @property bool $is_free
 * @property string|null $text
 * @property string|null $task_text
 * @property int|null $task_type
 * @property string|null $task_content
 * @property int|null $duration
 * @property string|null $positions
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property \App\Models\Lesson|null $lesson
 * @property Track $track
 * @property Collection|\App\Models\Lesson[] $lessons
 * @property Collection|User[] $users
 *
 * @package App\Models\Base
 */
class Lesson extends Model
{
	protected $table = 'lessons';

	protected $casts = [
		'uuid' => 'uuid',
		'track_id' => 'int',
		'parent_id' => 'int',
		'is_active' => 'bool',
		'is_need_parent' => 'bool',
		'is_free' => 'bool',
		'task_type' => 'int',
		'duration' => 'int'
	];

	public function lesson()
	{
		return $this->belongsTo(\App\Models\Lesson::class, 'parent_id');
	}

	public function track()
	{
		return $this->belongsTo(Track::class);
	}

	public function lessons()
	{
		return $this->hasMany(\App\Models\Lesson::class, 'parent_id');
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_lessons')
					->withPivot('id', 'started_at', 'status', 'time', 'grade')
					->withTimestamps();
	}
}
