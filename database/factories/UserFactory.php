<?php
use Faker\Generator as Faker;

// php artisan make:factory PostFactory
// php artisan make:factory PostFactory --model=Post
$factory->define(App\Models\RBAC\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

// $factory->define(App\Post::class, function ($faker) {
    // return [
        // 'title' => $faker->title,
        // 'content' => $faker->paragraph,
        // 'user_id' => function () {
        //     return factory(App\User::class)->create()->id;
        // }
            // 'user_type' => function (array $post) {
            //     return App\User::find($post['user_id'])->type;
            // }
    // ];
// });

// $factory->state(App\User::class, 'delinquent', [
//     'account_status' => 'delinquent',
// ]);

// $factory->state(App\User::class, 'address', function ($faker) {
//     return [
//         'address' => $faker->address,
//     ];
// });

// $factory->afterMaking(App\User::class, function ($user, $faker) {
// });

// $factory->afterCreating(App\User::class, function ($user, $faker) {
//     $user->accounts()->save(factory(App\Account::class)->make());
// });

// $factory->afterMakingState(App\User::class, 'delinquent', function ($user, $faker) {
// });

// $factory->afterCreatingState(App\User::class, 'delinquent', function ($user, $faker) {
// });
