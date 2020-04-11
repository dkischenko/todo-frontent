<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Project;
use App\Models\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) use ($factory){
    return [
        'project_id' => $factory->create(Project::class)->id,
        'title' => $faker->title,
        'status' => random_int(0, 1),
        'deadline' => null
    ];
});
