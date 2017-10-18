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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [
        'fname' => $faker->name,
        'lname' => $faker->name,
        'email' => $faker->safeEmail,
        'status' => $faker->boolean,
        'phone1' => $faker->phoneNumber,
        'phone2' => $faker->phoneNumber,
        'address' => $faker->address,
        'username' => $faker->name,
        'password' => bcrypt(str_random(10)),
    ];
});
$factory->define(App\ProductOrder::class, function (Faker\Generator $faker) {
    return [
        'cusId' => $faker->randomDigit,
        'name' => $faker->name,
        'company' => $faker->name,
        'mobile' => $faker->phoneNumber,
        'tel' => $faker->phoneNumber,
        'fax' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'website' => $faker->name,
        'street' => $faker->name,
        'city' => $faker->name,
        'country' => $faker->name,
        'reason' => $faker->text,
        'res_build' => $faker->text,
        'comm_build' => $faker->text,
        'pub_build' => $faker->text,
        'others' => $faker->text,
        'budget' => $faker->sentence,
        'des_draw' => $faker->text,
        'beg_time' => $faker->sentence,
        'team_need' => $faker->text,
    ];
});
$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [
        'fname' => $faker->name,
        'lname' => $faker->name,
        'email' => $faker->safeEmail,
        'status' => $faker->boolean,
        'phone1' => $faker->phoneNumber,
        'phone2' => $faker->phoneNumber,
        'address' => $faker->address,
        'username' => $faker->name,
        'password' => bcrypt(str_random(10)),
    ];
});
$factory->define(App\ReqDesign::class, function (Faker\Generator $faker) {
    return [
        'orderId' =>12,
        'tot_floor' => $faker->randomDigit,
        'floors' => $faker->randomFloat(),
        'capacity' => $faker->randomDigit,
        'shape_roof' => $faker->text,
        'liv_room' => $faker->randomDigit,
        'din_room' => $faker->randomDigit,
        'tot_br' => $faker->randomDigit,
        'bedrooms' => $faker->text,
        'shar_bathr' => $faker->randomDigit,
        'kitch' => $faker->randomDigit,
        'balecony' => $faker->randomDigit,
        'study_r' => $faker->randomDigit,
        'laundry_r' => $faker->randomDigit,
        'servant_r' => $faker->randomDigit,
        'garage' => $faker->randomDigit,
        'reqs' => $faker->text,
    ];
});
$factory->define(App\Supplier::class, function (Faker\Generator $faker) {
    return [
        'fname' => $faker->name,
        'lname' => $faker->name,
        'phone1' => $faker->phoneNumber,
        'phone2' => $faker->phoneNumber,
        'fax' => $faker->phoneNumber,
        'address' => $faker->address,
    ];
});
$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'category' => $faker->name,
        'desc' => $faker->paragraph,
    ];
});
$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'category_id' => 2,
        'supplier_id' => 2,
        'name' => $faker->name,
        'category' => $faker->name,
        'desc' => $faker->text,
        'img' => $faker->image(),
        'unit' => $faker->name,
        'cost_price' => $faker->randomDigit,
        'buy_price' => $faker->randomDigit,
        'parcode' => $faker->randomNumber(),
    ];
});
$factory->define(App\Executer::class, function (Faker\Generator $faker) {
    return [
        'fname' => $faker->name,
        'lname' => $faker->name,
        'email' => $faker->safeEmail,
        'phone1' => $faker->phoneNumber,
        'phone2' => $faker->phoneNumber,
        'address' => $faker->address,
    ];
});
$factory->define(App\Service::class, function (Faker\Generator $faker) {
    return [
        'executer_id' =>1,
        'name' => $faker->name,
        'type' => $faker->name,
        'price' => $faker->randomDigit,
    ];
});
$factory->define(App\Offer::class, function (Faker\Generator $faker) {
    return [
        'customer_id' => 2,
        'desc' => $faker->name,
        'quantity' => 3,
        'unit' => $faker->name,
        'unit_price' => 11,
        'tot_price' =>3*11,
        'status' => 'active',
    ];
});
$factory->define(App\Bill::class, function (Faker\Generator $faker) {
    return [
        'customer_id' => 2,
        'desc' => $faker->name,
        'quantity' => $faker->randomDigit,
        'unit' => $faker->name,
        'unit_price' => $faker->randomNumber(),
        'tot_price' => 1000,
        'status' => 'paid in Full',
    ];
});
$factory->define(App\SellingAgent::class, function (Faker\Generator $faker) {
    return [
        'fname' => $faker->name,
        'lname' => $faker->name,
        'email' => $faker->safeEmail,
        'phone1' => $faker->phoneNumber,
        'phone2' => $faker->phoneNumber,
        'address' => $faker->address,
        'username' => $faker->name,
        'password' => bcrypt(str_random(10)),
    ];
});