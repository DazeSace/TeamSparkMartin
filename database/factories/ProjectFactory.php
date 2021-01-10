<?php

/** @var Factory $factory */

use App\Project;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Project::class, function (Faker $faker) {
    return [
        //'user_id' => factory(User::class),
        'title' => '[Beispiel] ' . $faker->sentence(6, true),
        'summary' => $faker->paragraph(3, true),
        'content' => $faker->text(555),
        'image' => $faker->randomElement(['/uploads/projects/projekt1.png', '/uploads/projects/projekt2.png', '/uploads/projects/projekt3.png', '/uploads/projects/projekt4.png', '/uploads/projects/projekt5.png', '/uploads/projects/projekt6.png']),
        'teamStatus' => $faker->randomElement(['searching', 'complete', 'finished']),
        'projectStatus' => $faker->randomElement(['preparation', 'going', 'paused', 'successful', 'aborted'])
    ];
});
