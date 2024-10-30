<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
 * @package App\Models
 */
class Company extends Model{
    use HasFactory;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'name',
		'alias',
		'user_id'
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
