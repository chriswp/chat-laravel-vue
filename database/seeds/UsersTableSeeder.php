<?php

use Illuminate\Database\Seeder;
use Chat\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'napa',
            'email' => 'napa@napa.com',
            'password' => bcrypt(1)
        ]);
    }
}
