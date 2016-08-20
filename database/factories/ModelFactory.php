<?php
//TODO clean up model factory
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->safeEmail,
//        'password' => bcrypt(str_random(10)),
//        'remember_token' => str_random(10)
//    ];
//});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Subnets::class, function (Faker\Generator $faker) {
    return [
        'site_id' => $faker->numberBetween(1, 50),
        'subnet_node_id' => $faker->numberBetween(1, 50),
        'ip_address' => function(){
            $X3_1 = random_int(0,255);
            $X3_2 = random_int(0,255);
            $X3_3 = random_int(0,255);
            $X3_4 = random_int(0,255);

            $fake_ip = $X3_1 . '.' . $X3_2 . '.' . $X3_3 . '.' . $X3_4;

            return $fake_ip;
        },
        'prefix_length' => 24,
        'name' => $faker->name,
        'default_gateway' => function(){
            $X3_1 = random_int(0,255);
            $X3_2 = random_int(0,255);
            $X3_3 = random_int(0,255);
            $X3_4 = random_int(0,255);

            $default_gate_number = $X3_1 . '.' . $X3_2 . '.' . $X3_3 . '.' . $X3_4;

            return $default_gate_number;
        },
    ];
});