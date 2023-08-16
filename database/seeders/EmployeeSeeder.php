<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB:: table('employees')->insert([
            'emp_name'=> 'abc',
            'emp_post'=> 'abc',
            'emp_maristatus'=> 'married',
            'emp_gender'=> 'male',
            'emp_joinDate'=>date('Y-m-d', strtotime('07/05/2023')),
            'usertype' => 'employeee',
        ]);
    }
}
