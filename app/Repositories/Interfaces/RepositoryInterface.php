<?php


namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface RepositoryInterface
 * @package App\Repositories
 */
interface RepositoryInterface
{
    /**
     * List all items
     *
     * @return mixed
     */
    public function all();

    /**
     * Update the new Model
     *
     * @param array $data
     * @return void
     */
    public function create(array $data): void;

    /**
     * Update the given Model
     *
     * @param array $data
     * @param Model $model
     * @return mixed
     */
    public function update(array $data, Model $model);

    /**
     * @param Model $model
     * @return mixed
     */
    public function destroy(Model $model);
}
