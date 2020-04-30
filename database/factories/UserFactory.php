<?php 

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\User;

$factory->define(User::class, function (Faker $faker) {
    return array_merge(
    	[
	        'name' => $faker->name,
	        'email' => $faker->unique()->safeEmail,
	        'email_verified_at' => now(),
	        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
	        'remember_token' => Str::random(10),
	    ], 

    	config('auth.user_has_profile') ? 
    	[
    		'username' => $faker->slug
    	] :
    	[]
    );
});