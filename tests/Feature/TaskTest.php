<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Session;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function user_can_create_task_without_deadline()
    {
        $this->withoutExceptionHandling();
        Session::start();

        $project = factory(Project::class)->create();
        $this
            ->actingAs($project->user)
            ->post(route('tasks.store'), [
                '_token' => Session::token(),
                'title' => 'Simple task',
                'status' => 0,
                'project_id' => $project->id
            ])
            ->assertStatus(302);
    }

    /** @test */
    public function user_can_update_task_with_deadline()
    {
        $this->withoutExceptionHandling();
        Session::start();

        $task = factory(Task::class)->create([
            'title' => 'Test task #1'
        ]);

        $this
            ->actingAs($task->project->user)
            ->put(route('tasks.update', $task->id), [
                '_token' => Session::token(),
                'status' => 0,
                'title' => 'Test task updated #1',
                'deadline' => '2020-05-25',
                'project_id' => $task->project->id
            ])
            ->assertStatus(302);
    }

    /** @test */
    public function user_can_update_task_without_deadline()
    {
        $this->withoutExceptionHandling();
        Session::start();

        $task = factory(Task::class)->create([
            'title' => 'Test task #1'
        ]);

        $this
            ->actingAs($task->project->user)
            ->put(route('tasks.update', $task->id), [
                '_token' => Session::token(),
                'status' => 1,
                'title' => 'Test task updated #1',
                'project_id' => $task->project->id
            ])
            ->assertStatus(302);
    }

    /** @test */
    public function user_can_delete_task()
    {
        $this->withoutExceptionHandling();
        Session::start();

        $task = factory(Task::class)->create([
            'title' => 'Test task #1'
        ]);

        $this
            ->actingAs($task->project->user)
            ->delete(route('tasks.destroy', $task->id), [
                '_token' => Session::token(),
            ])
            ->assertStatus(302);
    }
}
