<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Role::class)->make()->save();
        factory(App\Role::class)->make([
        	'title' => 'user',
    	])->save();
    }
}
