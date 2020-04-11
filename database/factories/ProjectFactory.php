<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Project;
use App\User;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) use ($factory){
    return [
        'title' => $faker->title,
        'user_id' => $factory->create(User::class)->id
    ];
});
