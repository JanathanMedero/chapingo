<?php

namespace Database\Seeders;

use App\Models\User;
use DB;
use Database\Seeders\RoleSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
        ]);

        // \App\Models\User::factory(100)->create();

        User::create([
            'name'      => 'Janathan Medero Pineda',
            'slug'      =>  Str::slug('Janathan Medero Pineda'),
            'email'     => 'webmaster@pyscom.com',
            'password'  => Hash::make('webmaster.pyscom2021'),
        ])->assignRole('administrator');

        User::create([
            'name'      => 'Johan Doe Silver',
            'slug'      =>  Str::slug('Johan Doe Silver'),
            'email'     => 'johan@pyscom.com',
            'password'  => Hash::make('admin'),
        ])->assignRole('administrator');

        User::create([
            'name'      => 'John Doe',
            'slug'      =>  Str::slug('John Doe'),
            'email'     => 'john@pyscom.com',
            'password'  => Hash::make('admin'),
        ])->assignRole('moderator');

        User::create([
            'name'      => 'Christina Maths Loe',
            'slug'      =>  Str::slug('Christina Maths Loe'),
            'email'     => 'christina@pyscom.com',
            'password'  => Hash::make('admin'),
        ])->assignRole('moderator');

        User::create([
            'name'      => 'Wilson Thomas Doe',
            'slug'      =>  Str::slug('Wilson Thomas Doe'),
            'email'     => 'wilson@pyscom.com',
            'password'  => Hash::make('admin'),
        ])->assignRole('moderator');

        User::create([
            'name'      => 'Luisa Yohan Doe',
            'slug'      =>  Str::slug('Luisa Yohan Doe'),
            'email'     => 'luisa@pyscom.com',
            'password'  => Hash::make('admin'),
        ])->assignRole('redactor');

        User::create([
            'name'      => 'Cloe Dischannel',
            'slug'      =>  Str::slug('Cloe Dischannel'),
            'email'     => 'cloe@pyscom.com',
            'password'  => Hash::make('admin'),
        ])->assignRole('redactor');

        User::create([
            'name'      => 'Marco Olivares Doe',
            'slug'      =>  Str::slug('Marco Olivares Doe'),
            'email'     => 'Marco@pyscom.com',
            'password'  => Hash::make('admin'),
        ])->assignRole('redactor');
    }
}
