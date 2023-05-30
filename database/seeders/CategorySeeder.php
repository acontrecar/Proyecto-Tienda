<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $rowsProducts = [
            [
                'name' => 'Hombre',
            ],

            [
                'name' => 'Mujer',
            ],

            [
                'name' => 'Unisex',
            ],
        ];

        DB::table('categories')->insert($rowsProducts);
    }
}
