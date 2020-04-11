<?php

namespace App\Http\Traits;

use App\Models\Project;
use App\Repositories\ProjectRepository;

/**
 * @package App\Http\Traits
 */
trait ProjectTrait
{
    /** @var ProjectRepository */
    protected $model;

    /**
     * @param Project $project
     */
    public function __construct(Project $project)
    {
        $this->model = new ProjectRepository($project);
    }
}
