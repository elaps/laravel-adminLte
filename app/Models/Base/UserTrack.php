<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Track;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserTrack
 * 
 * @property int $id
 * @property int $user_id
 * @property int $track_id
 * @property Carbon|null $started_at
 * @property Carbon|null $finished_at
 * @property int $done_percent
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Track $track
 * @property User $user
 *
 * @package App\Models\Base
 */
class UserTrack extends Model
{
	protected $table = 'user_tracks';

	protected $casts = [
		'user_id' => 'int',
		'track_id' => 'int',
		'started_at' => 'datetime',
		'finished_at' => 'datetime',
		'done_percent' => 'int',
		'status' => 'int'
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
