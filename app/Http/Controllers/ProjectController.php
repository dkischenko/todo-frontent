<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProject;
use App\Http\Traits\ProjectTrait;
use App\Models\Project;

class ProjectController extends Controller
{
    use ProjectTrait;

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProject $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProject $request)
    {
        $this->model->create($request->all());
        return redirect()->home();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreProject $request
     * @param Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProject $request, Project $project)
    {
        $this->model->update($request->all(), $project);
        return redirect()->home();
    }

    /**
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project)
    {
        $this->model->destroy($project);
        return redirect()->home();
    }
}
