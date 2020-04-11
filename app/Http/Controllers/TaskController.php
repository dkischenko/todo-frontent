<?php

namespace App\Http\Controllers;

use App\{Http\Requests\StoreTask, Http\Traits\TaskTrait, Models\Task};
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    use TaskTrait;

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTask $request
     * @return RedirectResponse
     */
    public function store(StoreTask $request)
    {
        $this->model->create($request->all());
        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreTask $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(StoreTask $request, Task $task)
    {
        $this->model->update($request->all(), $task);
        return redirect()->route('home');
    }

    /**
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Task $task)
    {
        $this->model->destroy($task);
        return redirect()->route('home');
    }
}
