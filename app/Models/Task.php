<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
 * @property int $project_id
 * @property int $status
 * @property string|null $deadline
 * @property-read Project $project
 * @method static Builder|Task whereDeadline($value)
 * @method static Builder|Task whereProjectId($value)
 * @method static Builder|Task whereStatus($value)
 */
class Task extends Model
{
    protected $fillable = [
        'title',
        'status',
        'deadline',
        'project_id'
    ];

    /**
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
