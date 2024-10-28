<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Module
 * 
 * @property int $id
 * @property string $title
 * @property int $company_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Company $company
 * @property Collection|Track[] $tracks
 *
 * @package App\Models
 */
class Module extends Model
{
	protected $table = 'modules';

	protected $casts = [
		'company_id' => 'int'
	];

	protected $fillable = [
		'title',
		'company_id'
	];

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function tracks()
	{
		return $this->hasMany(Track::class);
	}
}
