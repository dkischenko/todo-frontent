<?php

namespace App\Models;

use App\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Task
 *
 * @property int $id
 * @property string $title
 * @property bool $done
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Task newModelQuery()
 * @method static Builder|Task newQuery()
 * @method static Builder|Task query()
 * @method static Builder|Task whereCreatedAt($value)
 * @method static Builder|Task whereDone($value)
 * @method static Builder|Task whereId($value)
 * @method static Builder|Task whereTitle($value)
 * @method static Builder|Task whereUpdatedAt($value)
 * @mixin Eloquent
 * @property int $user_id
 * @property-read Collection|Task[] $task
 * @property-read int|null $task_count
 * @property-read User $user
 * @method static Builder|Project whereUserId($value)
 */
class Project extends Model
{
    protected $fillable = [
        'title',
        'user_id'
    ];

    /**
     * @return HasMany
     */
    public function task(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
