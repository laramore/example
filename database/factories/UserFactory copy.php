<?php

// use Illuminate\Database\Eloquent\Factory as EloquentFactory;

// dump($factory, app(EloquentFactory::class));

// \App\Models\Group::defineFactory(function () {
//     return [
//         'admin_user' => \App\Models\User::inRandomOrder()->first(),
//     ];
// });

\App\Models\User::defineFactory(function ($factory, $faker) {
    // $factory->useDefault(false);

    $factory->number = $faker->numberBetween(0, 5);
    $factory->json;
    // $factory->useStates('');
});

\App\Models\Group::defineFactory(function ($factory) {
    // $factory->useDefault(false);

    $factory->creator = \App\Models\User::inRandomOrder()->first();
    $factory->applyState('admin_user');
});

\App\Models\Group::defineState('admin_user', function ($factory) {
    $factory->admin_user = \App\Models\User::factory();
});