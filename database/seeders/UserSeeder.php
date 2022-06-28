<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username'      => 'bmsnepal',
            'name'          => 'BMS NEPAL',
            'phone'         => '015233429',
            'designation'   => 'owner',
            'status'        => 1,
            'email'         => 'info@bmsnepal.net',
            'password'      => bcrypt('bmsnepal'),
            'role_id'      => 1
        ]);
    }
}
