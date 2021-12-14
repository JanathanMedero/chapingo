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
        //Roles
        $administrator  = Role::create(['name' => 'administrator']);
        $moderator      = Role::create(['name' => 'moderator']);
        $redactor       = Role::create(['name' => 'redactor']);

        //admin permission
        Permission::create(['name' => 'delete user'])->assignRole($administrator);
        Permission::create(['name' => 'add user'])->assignRole($administrator);
        Permission::create(['name' => 'show users'])->assignRole($administrator);

        //Moderator and Admin permission
        Permission::create(['name' => 'show redactors'])->assignRole($administrator, $moderator);

        //Redactor permission
        Permission::create(['name' => 'create posts'])->assignRole($redactor);

    }
}
