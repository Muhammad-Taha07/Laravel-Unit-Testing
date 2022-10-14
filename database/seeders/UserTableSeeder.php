<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
         [
            'name'                      =>      'Muhammad Taha',
            'email'                     =>      'backend_admin@yopmail.com',
            'password'                  =>      'Taha@123'
         ],

         [
            'name'                      =>      'Alina Wahab',
            'email'                     =>      'alina01@yopmail.com',
            'password'                  =>      \Hash::make('Alina@123')
         ],

         [
            'name'                      =>      'Tahaa Test Account',
            'email'                     =>      'backend_test@yopmail.com',
            'password'                  =>      'test@123'
            // 'password'                  =>      \Hash::make('Salman@123')
        ],

        [
            'name'                      =>      'Salman Ahmed',
            'email'                     =>      'salmanjello@yopmail.com',
            'password'                  =>      \Hash::make('Salman@123')
        ]
    ]);
    }
}
