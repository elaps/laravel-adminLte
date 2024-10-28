<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Company;
use App\Models\Lesson;
use App\Models\Track;
use App\Models\UserTask;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Company[] $companies
 * @property Collection|Lesson[] $lessons
 * @property Collection|UserTask[] $user_tasks
 * @property Collection|Track[] $tracks
 *
 * @package App\Models\Base
 */
class User extends Model
{
	protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime'
	];

	public function companies()
	{
		return $this->hasMany(Company::class);
	}

	public function lessons()
	{
		return $this->belongsToMany(Lesson::class, 'user_lessons')
					->withPivot('id', 'started_at', 'status', 'time', 'grade')
					->withTimestamps();
	}

	public function user_tasks()
	{
		return $this->hasMany(UserTask::class);
	}

	public function tracks()
	{
		return $this->belongsToMany(Track::class, 'user_tracks')
					->withPivot('id', 'started_at', 'finished_at', 'done_percent', 'status')
					->withTimestamps();
	}
}
