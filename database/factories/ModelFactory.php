<?php
//TODO add model factories
//subnetnodes
//sitelocations
//printer queues
//etc
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

use Illuminate\Database\Connection;

$factory->define(App\Models\Database\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Database\Subnets::class, function (Faker\Generator $faker) {
    $ip = $faker->ipv4;
    $netmask = $faker->ipv4;
    $prefix_length = $faker->netmask2cidr($netmask);
    $default_gateway = $faker->cidr2network($ip, $prefix_length);

    $faker->setIpAddress($ip);
    $faker->setCidr($prefix_length);
    $faker->setDefaultGateway($default_gateway);

    return [
        'site_id' => $faker->numberBetween(1, 12),
        'subnet_node_id' => $faker->numberBetween(1, 50),
        'ip_address' => $faker->getIpAddress(),
        'prefix_length' => $faker->getCidr(),
        'name' => $faker->lastName,
        'default_gateway' => $faker->getDefaultGateway()
    ];
});

$factory->define(App\Models\Database\Subnet_Nodes::class, function (Faker\Generator $faker) {

    return [

        'ip_address' => $faker->ipv4,
        'site_location_id' => $faker->numberBetween(100, 599),
        'entity_type_id' => $faker->numberBetween(1, 3),
        'mac_address' => $faker->macAddress,
        'name' => $faker->lastName,
        'MAB_status' => $faker->boolean(50), // 50% true || false
    ];
});

$factory->define(App\Models\Database\Printers::class, function (Faker\Generator $faker) {
    return [
        'subnet_id' => $faker->numberBetween(1, 50),
        'ip_address' => $faker->ipv4,
        'mac_address' => $faker->macAddress,
        'serial_number' => $faker->creditCardNumber,
        'print_server' => $faker->lastName,
        'print_queue' => $faker->lastName,
    ];
});

$factory->define(App\Models\Database\Computers::class, function (Faker\Generator $faker) {
    return [
        'subnet_id' => $faker->numberBetween(1, 50),
        'ip_address' => $faker->ipv4,
        'mac_address' => $faker->macAddress,
        'serial_number' => $faker->creditCardNumber,
        'operating_system' => function()
        {
            $tokenIndex = random_int(1, 3);
            if ($tokenIndex == 3){
                return "windows";
            } elseif ($tokenIndex == 2) {
                return "OSX";
            } else {
                return "linux";
            }
        },
        'virtual_machine_flag' => $faker->boolean,
    ];
});

$factory->define(App\Models\Database\Placeholders::class, function (Faker\Generator $faker) {
    return [
        'subnet_id' => $faker->numberBetween(1, 50),
        'ip_address' => $faker->ipv4,
        'mac_address' => $faker->macAddress,
        'serial_number' => $faker->creditCardNumber,
    ];
});

$factory->define(App\Models\Database\Sites::class, function (Faker\Generator $faker) {

    $buildingCollection = App\Models\Database\Sites::all();
    $buildingAbvArray = $buildingCollection->pluck('abbreviaton');
    $buildingName = $faker->unique()->lastName . " Bldg.";
    $shiftAbvSubstr = 0;
    foreach ($buildingAbvArray as $abv)
    {
        if ((strtoupper(substr($buildingName, 0, 3))) != $abv)
        {
            $shiftAbvSubstr = $shiftAbvSubstr;
        }else{
            $shiftAbvSubstr++;
        }
    };
    if ($shiftAbvSubstr > 0)
    {
        $abbreviation = strtoupper(substr($buildingName, 1, 3));
    }else{
        $abbreviation = strtoupper(substr($buildingName, 0, 3));
    }

    return [
        'name' => $buildingName,
        'abbreviation' => $abbreviation,
        'address' => $faker->streetAddress,
        'vlan_id' => $faker->randomNumber(5)
    ];
});

$factory->define(App\Models\Database\Site_Locations::class, function (Faker\Generator $faker) {

    $buildingName = $faker->lastName . " Bldg.";
    $abbreviation = strtoupper(substr($buildingName, 0, 3));

    return [
        'site_id' => $faker->numberBetween(1, 12),
        'building_name' => $buildingName,
        'room_number' => $faker->numberBetween(100, 599)
    ];
});
