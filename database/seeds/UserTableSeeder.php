<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i = 0; $i < 10; $i++) 
    	{
    		$faker = Faker\Factory::create();

	        User::create([
        		'username' => $faker->userName,
        		'email' => $faker->email,
        		'password' => bcrypt('secret'),
        		'role_id' => 2,
        		'active' => 1,
	        ]);
        }
    }
}
