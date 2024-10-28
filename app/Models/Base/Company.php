<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Module;
use App\Models\Track;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * 
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Collection|Module[] $modules
 * @property Collection|Track[] $tracks
 *
 * @package App\Models\Base
 */
class Company extends Model
{
	protected $table = 'companies';

	protected $casts = [
		'user_id' => 'int'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function modules()
	{
		return $this->hasMany(Module::class);
	}

	public function tracks()
	{
		return $this->hasMany(Track::class);
	}
}
