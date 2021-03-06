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
    App\Models\User::class,
    function (Faker\Generator $faker) {
        return [
            'name'                 => $faker->name,
            'email'                => $faker->email,
            'password'             => bcrypt(str_random(10)),
            'remember_token'       => str_random(10),
            'gender'               => 1,
            'telephone'            => $faker->phoneNumber,
            'birthday'             => $faker->date('Y-m-d'),
            'locale'               => $faker->languageCode,
            'address'              => $faker->address,
            'last_notification_id' => 0,
            'api_access_token'     => '',
            'profile_image_id'     => 0,
            'is_activated'         => 0,
        ];
    }
);

$factory->define(
    App\Models\AdminUser::class,
    function (Faker\Generator $faker) {
        return [
            'name'                 => $faker->name,
            'email'                => $faker->email,
            'password'             => bcrypt(str_random(10)),
            'remember_token'       => str_random(10),
            'locale'               => $faker->languageCode,
            'last_notification_id' => 0,
            'api_access_token'     => '',
            'profile_image_id'     => 0,
        ];
    }
);

$factory->define(
    App\Models\AdminUserRole::class,
    function (Faker\Generator $faker) {
        return [
            'admin_user_id' => $faker->randomNumber(),
            'role'          => 'supper_user'
        ];
    }
);

$factory->define(
    App\Models\SiteConfiguration::class,
    function (Faker\Generator $faker) {
        return [
            'locale'                => 'ja',
            'name'                  => $faker->name,
            'title'                 => $faker->sentence,
            'keywords'              => implode(',', $faker->words(5)),
            'description'           => $faker->sentences(3, true),
            'ogp_image_id'          => 0,
            'twitter_card_image_id' => 0,
        ];
    }
);

$factory->define(
    App\Models\Image::class,
    function (Faker\Generator $faker) {
        return [
            'url'                => $faker->imageUrl(),
            'title'              => $faker->sentence,
            'is_local'           => false,
            'entity_type'        => '',
            'entity_id'          => 0,
            'file_category_type' => '',
            's3_key'             => '',
            's3_bucket'          => '',
            's3_region'          => '',
            's3_extension'       => '',
            'media_type'         => 'image/png',
            'format'             => 'png',
            'file_size'          => 0,
            'width'              => 100,
            'height'             => 100,
            'is_enabled'         => true,
        ];
    }
);

$factory->define(
    App\Models\Article::class,
    function (Faker\Generator $faker) {
        return [
            'slug'               => $faker->word,
            'title'              => $faker->sentence,
            'keywords'           => implode(',', $faker->words(5)),
            'description'        => $faker->sentences(3, true),
            'content'            => $faker->sentences(3, true),
            'cover_image_id'     => 0,
            'locale'             => 'ja',
            'is_enabled'         => true,
            'publish_started_at' => $faker->dateTime,
            'publish_ended_at'   => $faker->dateTime,
        ];
    }
);

$factory->define(
    App\Models\UserNotification::class,
    function (Faker\Generator $faker) {
        return [
            'user_id'       => \App\Models\UserNotification::BROADCAST_USER_ID,
            'category_type' => \App\Models\UserNotification::CATEGORY_TYPE_SYSTEM_MESSAGE,
            'type'          => \App\Models\UserNotification::TYPE_GENERAL_MESSAGE,
            'data'          => '',
            'locale'        => 'en',
            'content'       => 'TEST',
            'read'          => false,
            'sent_at'       => $faker->dateTime,
        ];
    }
);

$factory->define(
    App\Models\AdminUserNotification::class,
    function (Faker\Generator $faker) {
        return [
            'user_id'       => \App\Models\AdminUserNotification::BROADCAST_USER_ID,
            'category_type' => \App\Models\AdminUserNotification::CATEGORY_TYPE_SYSTEM_MESSAGE,
            'type'          => \App\Models\AdminUserNotification::TYPE_GENERAL_MESSAGE,
            'data'          => '',
            'locale'        => 'en',
            'content'       => 'TEST',
            'read'          => false,
            'sent_at'       => $faker->dateTime,
        ];
    }
);

$factory->define(
    App\Models\Category::class,
    function (Faker\Generator $faker) {
        return [
            'name'  => $faker->word,
            'slug'  => $faker->word,
            'order' => 1,
        ];
    }
);

$factory->define(
    App\Models\Subcategory::class,
    function (Faker\Generator $faker) {
        return [
            'category_id' => 1,
            'name'        => $faker->name,
            'slug'        => $faker->slug,
            'order'       => 1,
        ];
    }
);

$factory->define(
    App\Models\Customer::class,
    function (Faker\Generator $faker) {
        return [
            'name'            => $faker->name,
            'address'         => $faker->address,
            'telephone'       => $faker->phoneNumber,
            'province_id'     => 0,
            'district_id'     => 0,
            'avatar_image_id' => 0
        ];
    }
);

$factory->define(
    App\Models\Employee::class,
    function (Faker\Generator $faker) {
        return [
            'name'        => $faker->name,
            'address'     => $faker->address,
            'telephone'   => $faker->phoneNumber,
            'province_id' => 0,
            'district_id' => 0
        ];
    }
);

$factory->define(
    App\Models\Property::class,
    function (Faker\Generator $faker) {
        return [
            'name' => $faker->name,
            'slug' => $faker->slug,
        ];
    }
);

$factory->define(
    App\Models\PropertyValue::class,
    function (Faker\Generator $faker) {
        return [
            'property_id' => 1,
            'value'       => $faker->word,
        ];
    }
);

$factory->define(
    App\Models\Product::class,
    function (Faker\Generator $faker) {
        return [
            'code'           => $faker->word,
            'name'           => $faker->name,
            'subcategory_id' => 1,
            'unit_id'        => 1,
            'unit2_id'       => 1,
            'unit_exchange'  => 1,
            'descriptions'   => $faker->sentences(3, true),
            'is_enabled'     => 1,
        ];
    }
);

$factory->define(
    App\Models\ProductOption::class,
    function (Faker\Generator $faker) {
        return [
            'product_id'   => 1,
            'import_price' => rand(50000, 200000),
            'export_price' => rand(200000, 500000),
            'quantity'     => rand(50, 250),
        ];
    }
);

$factory->define(
    App\Models\Log::class,
    function (Faker\Generator $faker) {
        return [
            'user_name' => $faker->userName,
            'action'    => $faker->word,
            'table'     => $faker->word,
            'record_id' => $faker->randomNumber(),
            'query'     => $faker->sentence,
        ];
    }
);

$factory->define(
    App\Models\ProductImage::class,
    function (Faker\Generator $faker) {
        return [
            'product_id' => 0,
            'image_id'   => 0,
            'order'      => 0,
        ];
    }
);

$factory->define(
    App\Models\ImportPriceHistory::class,
    function (Faker\Generator $faker) {
        return [
            'product_id'        => 0,
            'product_option_id' => 0,
            'price'             => 0,
            'creator_id'        => 0,
            'notes'             => $faker->sentence,
        ];
    }
);

$factory->define(
    App\Models\ExportPriceHistory::class,
    function (Faker\Generator $faker) {
        return [
            'product_id'        => 0,
            'product_option_id' => 0,
            'price'             => 0,
            'creator_id'        => 0,
            'notes'             => $faker->sentence,
        ];
    }
);

$factory->define(
    App\Models\Import::class,
    function (Faker\Generator $faker) {
        return [
            'times'      => $faker->time(),
            'notes'      => $faker->sentences(3, true),
            'creator_id' => $faker->randomNumber(),
        ];
    }
);

$factory->define(
    App\Models\Store::class,
    function (Faker\Generator $faker) {
        return [
            'name'      => $faker->name,
            'address'   => $faker->address,
            'telephone' => $faker->phoneNumber,
        ];
    }
);

$factory->define(
    App\Models\ImportDetail::class,
    function (Faker\Generator $faker) {
        return [
            'import_id'  => 0,
            'product_id' => 0,
            'option_id'  => 0,
            'prices'     => 100000,
            'quantity'   => 100,
            'unit_id'    => 1,
        ];
    }
);

$factory->define(
    App\Models\ProductOptionProperty::class,
    function (Faker\Generator $faker) {
        return [
            'product_option_id' => 0,
            'property_value_id' => 0,
        ];
    }
);

$factory->define(
    App\Models\Export::class,
    function (Faker\Generator $faker) {
        return [
            'employee_id'   => 0,
            'customer_id'   => 0,
            'store_id'      => 0,
            'times'         => $faker->date('Y-m-d'),
            'discount'      => $faker->numberBetween(0, 10),
            'discount_unit' => '%',
            'total_amount'  => 0,
            'notes'         => $faker->sentences(4, true),
            'creator_id'    => 0,
        ];
    }
);

$factory->define(
    App\Models\ExportDetail::class,
    function (Faker\Generator $faker) {
        return [
            'export_id'  => 0,
            'product_id' => 0,
            'option_id'  => 0,
            'prices'     => $faker->numberBetween(100000, 2000000),
            'quantity'   => $faker->numberBetween(100, 1000),
            'unit_id'    => 1,
        ];
    }
);

$factory->define(
    App\Models\Unit::class,
    function (Faker\Generator $faker) {
        return [
            'name' => $faker->name
        ];
    }
);

/* NEW MODEL FACTORY */