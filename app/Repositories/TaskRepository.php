<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class TaskRepository implements RepositoryInterface
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
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): void
    {
        $this->model->create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(array $data, Model $model)
    {
        if (!isset($data['status'])) {
            $data['status'] = 0;
        }

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
