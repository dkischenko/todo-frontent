<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ProjectRepository implements RepositoryInterface
{
    /** @var Model */
    protected $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;

    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->model
            ->where('user_id', \Auth::id())
            ->with('task')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    /**
     * @param array $data
     */
    public function create(array $data): void
    {
        $this->model->create($data);
    }

    /**
     * @param array $data
     * @param Model $model
     * @return mixed|void
     */
    public function update(array $data, Model $model)
    {
        $model->update($data);
    }

    /**
     * @param Model $model
     * @return void
     */
    public function destroy(Model $model): void
    {
        $model->delete($model->id);
    }
}
