<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserTask
 * 
 * @property int $id
 * @property int $user_id
 * @property int $track_id
 * @property string|null $task_content
 * @property string|null $task_file
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Track $track
 * @property User $user
 *
 * @package App\Models
 */
class UserTask extends Model
{
	protected $table = 'user_tasks';

	protected $casts = [
		'user_id' => 'int',
		'track_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'user_id',
		'track_id',
		'task_content',
		'task_file',
		'status'
	];

	public function track()
	{
		return $this->belongsTo(Track::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
