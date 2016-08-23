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
            $fake_ip = long2ip(rand(0, "4294967295"));
            return $fake_ip;

        },

        'prefix_length' => function(){
            $fake_netmask = long2ip(rand(0, "4294967295"));
            $masker = new \App\Network();
            $prefix_length = $masker->netmask2cidr($fake_netmask);
            return $prefix_length;
        },
        'name' => $faker->name,
        'default_gateway' => function(){
            //$ip = $this['ip_address']; //wrong reference
            //$cidr = $this['prefix_length'];// wrong reference

            //same calculation method as 'ip_address' =>
            //$ip = function(){
                //$fake_ip = long2ip(rand(0, "4294967295"));
                //return $fake_ip;
                //return long2ip(rand(0, "4294967295"));
            //};

            $ip = long2ip(rand(0, "4294967295"));// used because there is an argument type error (expects a string, above gives object)

            //same calculation method as 'prefix_length' =>
            //$cidr = function() {

            //get a Closure error unless I do it this way.
                $fake_netmask = long2ip(rand(0, "4294967295"));
                $masker = new \App\Network();
                $cidr = $masker->netmask2cidr($fake_netmask);
                //return $prefix_length;
            //};
            $gateKeeper = new \App\Network();
            $default_gateway = $gateKeeper->cidr2network($ip, $cidr);
            return $default_gateway;
        },
    ];
});

$factory->define(App\Sites::class, function (Faker\Generator $faker) {
    return [
//
    ];
});

$factory->define(App\Site_Locations::class, function (Faker\Generator $faker) {
    return [
//
    ];
});

$factory->define(App\Printers::class, function (Faker\Generator $faker) {
    return [
//
    ];
});

$factory->define(App\Computers::class, function (Faker\Generator $faker) {
    return [
//
    ];
});

$factory->define(App\Entity_Types::class, function (Faker\Generator $faker) {
    return [
//
    ];
});