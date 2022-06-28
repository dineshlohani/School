<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user           = User::find(1);
        $premission     = Permission::get();
        $setPremission  = array();
        foreach($premission as $term){
            $setPremission[] = $term->id;
        }
        $user->syncPermissions($setPremission);
    }
}
