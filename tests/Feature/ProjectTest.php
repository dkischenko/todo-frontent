<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Task;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Session;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function user_can_create_project()
    {
        $this->withoutExceptionHandling();

        Session::start();

        $user = factory(User::class)->create();

        $this
            ->actingAs($user)
            ->post(route('projects.store'), [
                'title' => 'Test project 222',
                'user_id' => $user->id,
                '_token' => Session::token()
            ])
            ->assertStatus(302);
    }

    /** @test */
    public function user_can_update_project()
    {
        $this->withoutExceptionHandling();

        Session::start();

        $project = factory(Project::class)->create([
            'title' => 'Project to update'
        ]);
        $this
            ->actingAs($project->user)
            ->put(route('projects.update', $project->id), [
                'title' => 'Test project!',
                'user_id' => $project->user->id,
                '_token' => Session::token()
            ])
            ->assertStatus(302);
    }

    /** @test */
    public function user_can_delete_project()
    {
        $this->withoutExceptionHandling();
        Session::start();

        $project = factory(Project::class)->create([
            'title' => 'Project to delete'
        ]);
        $this
            ->actingAs($project->user)
            ->delete(route('projects.destroy', $project->id), [
                '_token' => Session::token()
            ])
            ->assertStatus(302);
    }

    /** @test */
    public function user_can_delete_project_with_tasks()
    {
        $this->withoutExceptionHandling();
        $task = factory(Task::class)->create();
        Session::start();

        $this
            ->actingAs($task->project->user)
            ->delete(route('projects.destroy', $task->project->id), [
                '_token' => Session::token()
            ])
            ->assertStatus(302);
    }
}
