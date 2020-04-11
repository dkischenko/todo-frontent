<?php

namespace App\Http\Traits;

use App\Models\Task;
use App\Repositories\TaskRepository;

/**
 * @package App\Http\Traits
 */
trait TaskTrait
{
    /** @var TaskRepository */
    protected $model;

    /**
     * TaskTrait constructor.
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->model = new TaskRepository($task);
    }
}
