<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
 * @package App\Models
 */
class UserTrack extends Model {
    use HasFactory;
    protected $table = 'user_tracks';

    protected $casts = [
        'user_id' => 'int',
        'track_id' => 'int',
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
        'done_percent' => 'int',
        'status' => 'int'
    ];

    protected $fillable = [
        'user_id',
        'track_id',
        'started_at',
        'finished_at',
        'done_percent',
        'status'
    ];

    public function track() {
        return $this->belongsTo(Track::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
