<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str as Str;

$factory->define(App\Page::class, function (Faker $faker) {
		$title = $faker->sentence;
    return [
        'title' => $title, 
        'content' => $faker->realText(200),
        'slug' => Str::slug($title),
    ];
});
