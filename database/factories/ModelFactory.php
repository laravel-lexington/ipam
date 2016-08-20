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

$factory->define(App\Users::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Sessions::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 50),
        'source' => $faker->url,
        'entrance' => $faker->url,
        'exit' => $faker->url,
        'device_type' => function()
        {
            $x = random_int(0,3);
            if ($x == 0)
            {
                return "Samsung";
            }elseif ($x == 1){
                return "LG";
            }elseif ($x == 2){
                return "HTC";
            }else{
                return "Apple";
            }
        },
        'pixel_width' => $faker->numberBetween(700, 1920),
        'pixel_height' => $faker->numberBetween(700, 1080),
        'country' => $faker->country
    ];
});

$factory->define(App\Payments::class, function (Faker\Generator $faker) {
    return [
        'payment_method_id' => $faker->numberBetween(1, 50),
        'order_id' => $faker->numberBetween(1, 50)
    ];
});

$factory->define(App\PaymentMethods::class, function (Faker\Generator $faker) {
    //cash, check, credit card, money order
    $payType = function () {
        $x = random_int(0, 3);
        if ($x == 0) {
            return "Cash";
        } elseif ($x == 1) {
            return "Check";
        } elseif ($x == 2) {
            return "Credit Card";
        } else {
            return "Money Order";
        }
    };
    //returns string if credit card, otherwise returns empty string
    $creditCardType = function ($payType) {
        if ($payType == "Credit Card") {
            $cc_Type = function () {
                $x = random_int(0, 3);
                if ($x == 0) {
                    return "Visa";
                } elseif ($x == 1) {
                    return "Mastercard";
                } elseif ($x == 2) {
                    return "American Express";
                } else {
                    return "Discover";
                }
            };
            return $cc_Type;
        } else {
            return "";
        }
    };
    //if credit card type is not an empty string, returns a fake credit card number
    $creditCardNumb = function ($creditCardType)
    {
        if ($creditCardType == "") {
            return "";
        }else{
            return $this->faker->creditCardNumber;
        }
    };
    //returns 7 digit number if check, otherwise returns empty string
    $rtOrAcctNumber = function ($payType){
        if ($payType == "Check") {
            return $this->faker->randomNumber(7);
        }else{
            return "";
        }
    };

    return [
        'user_id' => $faker->numberBetween(1, 50),
        'payment_type' =>  $payType,
        'route_number' => $rtOrAcctNumber,
        'account_number' => $rtOrAcctNumber,
        'cc_type' => $creditCardType,
        'cc_number' => $creditCardNumb,
        'cc_exp_date' => $faker->creditCardExpirationDate,
        'billing_address' => $faker->address,
        'shipping_address' => $faker->address
    ];
});

$factory->define(App\PageViews::class, function (Faker\Generator $faker) {
    return [
        'session_id' => $faker->numberBetween(1, 50),
        'user_id' => $faker->numberBetween(1, 50),
        'current_path' => $faker->url,
        'previous_path' => $faker->url,
        'next_path' => $faker->url,
        //this doesn't go here, its not in the migration: 'download_id' => $faker->numberBetween(1, 50)
    ];
});

$factory->define(App\Orders::class, function (Faker\Generator $faker) {
    return [
        'session_id' => $faker->numberBetween(1, 50),
        'user_id' => $faker->numberBetween(1, 50),
        //'item_id' => $faker->numberBetween(1, 50),
        'payment_id' => $faker->numberBetween(1, 50),
        'order_total' => $faker->randomFloat(0.00, 100000.00)
    ];
});

$factory->define(App\Items::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->paragraph(),
        'price' => $faker->randomFloat(0.00, 5000.00)
    ];
});

$factory->define(App\Downloads::class, function (Faker\Generator $faker) {
    return [
        'page_view_id' => $faker->numberBetween(1, 50),
        'filename' => str_random(10).'.'.'jpg'
    ];
});
