<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //$2y$04$SrKMnEPoDEuFB4aZ48SgSufPZFTmHc7M9m5d2LISFDhgtSHWE93xK

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$04$SrKMnEPoDEuFB4aZ48SgSufPZFTmHc7M9m5d2LISFDhgtSHWE93xK',
            'role' => 'ROLE_ADMIN',
        ]);
    }
}
