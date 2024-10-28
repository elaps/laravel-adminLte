<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Company;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\User;
use App\Models\UserTask;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Track
 * 
 * @property int $id
 * @property int $company_id
 * @property int $module_id
 * @property string $title
 * @property string|null $description
 * @property bool $is_active
 * @property bool $is_paid
 * @property string $picture
 * @property int $sort
 * @property int $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Company $company
 * @property Module $module
 * @property Collection|Lesson[] $lessons
 * @property Collection|UserTask[] $user_tasks
 * @property Collection|User[] $users
 *
 * @package App\Models\Base
 */
class Track extends Model
{
	protected $table = 'tracks';

	protected $casts = [
		'company_id' => 'int',
		'module_id' => 'int',
		'is_active' => 'bool',
		'is_paid' => 'bool',
		'sort' => 'int',
		'price' => 'int'
	];

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function module()
	{
		return $this->belongsTo(Module::class);
	}

	public function lessons()
	{
		return $this->hasMany(Lesson::class);
	}

	public function user_tasks()
	{
		return $this->hasMany(UserTask::class);
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_tracks')
					->withPivot('id', 'started_at', 'finished_at', 'done_percent', 'status')
					->withTimestamps();
	}
}
