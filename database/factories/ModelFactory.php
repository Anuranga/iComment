<?php

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

$factory->define(
    App\User::class,
    function (Faker\Generator $faker) {
        return [
            'name'  => $faker->name,
            'email' => $faker->email,
        ];
    }
);

$factory->define(
    \Driver\Data\Models\DriverTripTransaction::class,
    function (Faker\Generator $faker) {
        return [
            'driver_id'            => $faker->numberBetween(1, 20),
            'trip_id'              => $faker->numberBetween(1, 20),
            'transaction_type'     => $faker->randomElement(['CREDIT', 'DEBIT']),
            'transaction_category' => $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 9, 10, 11, 12, 13, 14, 15]),
            'amount'               => $faker->randomFloat(2),
            'description'          => '',
            'created_time'         => $faker->dateTimeAD,
            'created_date'         => $faker->date(),
            'created_by'           => $faker->numberBetween(1, 100),
        ];
    }
);

$factory->define(
    \Driver\Data\Models\Transaction::class,
    function (Faker\Generator $faker) {
        return [
            'passengers_log_id' => $faker->numberBetween(1, 20),
            'tripfare'          => $faker->numberBetween(1, 20),
            'distance'          => $faker->randomNumber(3),
            'actual_distance'   => $faker->randomNumber(3),
            'fare'              => $faker->randomElement(['CREDIT', 'DEBIT']),
        ];
    }
);

$factory->define(
    \Driver\Data\Models\People::class,
    function (Faker\Generator $faker) {
        return [
            'name'     => $faker->name,
            'lastname' => $faker->lastName,
        ];
    }
);

$factory->define(
    \Driver\Data\Models\PassengersLogArchive::class,
    function (Faker\Generator $faker) {
        return [
            'driver_id'          => $faker->numberBetween(1, 20),
            'passenger_name'     => $faker->name,
            'taxi_id'            => $faker->name,
            'pickup_time'        => $faker->time(),
            'actual_pickup_time' => $faker->time(),
        ];
    }
);

$factory->state(
    \Driver\Data\Models\DriverTripTransaction::class,
    'credit',
    function (\Faker\Generator $faker) {
        return [
            'transaction_type' => 'CREDIT',
        ];
    }
);