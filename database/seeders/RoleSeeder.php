<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrador  = Role::create(['name' => 'administrator']);
        $moderador      = Role::create(['name' => 'moderator']);

        //admin permmission
        Permission::create(['name' => 'delete user'])->assignRole($administrador);
        Permission::create(['name' => 'add user'])->assignRole($administrador);
        Permission::create(['name' => 'show users'])->assignRole($administrador);

    }
}
