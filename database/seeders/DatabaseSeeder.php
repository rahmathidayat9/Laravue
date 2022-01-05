<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$user_1 = User::create([
    		'name' => 'Rahmat Hidayatullah',
	        'email' => 'rahmat@example.com',
	        'password' => Hash::make('password'),
    	]);

    	$user_2 = User::create([
    		'name' => 'Diva Vivy ',
	        'email' => 'diva@example.com',
	        'password' => Hash::make('password'),
    	]);

    	$user_3 = User::create([
    		'name' => 'Hayasaka Ai',
	        'email' => 'hayasaka@example.com',
	        'password' => Hash::make('password'),
    	]);

        $user_4 = User::create([
            'name' => 'Chika Fujiwara',
            'email' => 'chika@example.com',
            'password' => Hash::make('password'),
        ]);

        $user_5 = User::create([
            'name' => 'Matsumoto',
            'email' => 'matsumoto@example.com',
            'password' => Hash::make('password'),
        ]);

        $user_6 = User::create([
            'name' => 'Mac Arthur',
            'email' => 'macarthur@example.com',
            'password' => Hash::make('password'),
        ]);

        $user_7 = User::create([
            'name' => 'Arcturus',
            'email' => 'arcturus@example.com',
            'password' => Hash::make('password'),
        ]);

        $user_8 = User::create([
            'name' => 'Polaris',
            'email' => 'polaris@example.com',
            'password' => Hash::make('password'),
        ]);

        $user_9 = User::create([
            'name' => 'Natsumi Koshigaya',
            'email' => 'natsumi@example.com',
            'password' => Hash::make('password'),
        ]);

        $user_10 = User::create([
            'name' => 'Komari Koshigaya',
            'email' => 'vega@example.com',
            'password' => Hash::make('password'),
        ]);

        $user_11 = User::create([
            'name' => 'Ichijou Hotaru',
            'email' => 'hotaru@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
