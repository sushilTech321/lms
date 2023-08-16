<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'post' => '',
            'maristatus' => '',
            'emp_gender' => '',
            'emp_joinDate'=>date('Y-m-d', strtotime('07/05/2023')),
            'email' => 'admin.peacenepal@gmail.com',
            'usertype' => 'admin',
            'password' => Hash::make('admin@peacenpl'),

        ]);
    }
}
