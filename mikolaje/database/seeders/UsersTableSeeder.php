<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //Admin
            [
                'name'=>'admin',
                'username'=>'admin',
                'email'=>'admin@demo.com',
                'role_as' => 'admin',
                'status' => 'active',
                'password' => Hash::make('111'),
            ],

            //Partner
            [
                'name'=>'partner',
                'username'=>'partner',
                'email'=>'partner@demo.com',
                'role_as' => 'partner',
                'status' => 'active',
                'password' => Hash::make('111'),
            ],


            // Employee
            [
                'name'=>'employee',
                'username'=>'employee',
                'email'=>'employee@demo.com',
                'role_as' => 'employee',
                'status' => 'active',
                'password' => Hash::make('111'),
            ],


            // Client
            [
                'name'=>'client',
                'username'=>'client',
                'email'=>'client@demo.com',
                'role_as' => 'client',
                'status' => 'active',
                'password' => Hash::make('111'),
            ],


        ]);
    }
}
