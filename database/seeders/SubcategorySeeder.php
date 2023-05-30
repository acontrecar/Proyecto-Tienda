<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $rowsProducts = [

            [
                'name' => 'Calzado',
                'category_id' => '1',
            ],

            [
                'name' => 'Ropa',
                'category_id' => '1',
            ],

            [
                'name' => 'Ropa interior',
                'category_id' => '1',
            ],

            [
                'name' => 'Calzado',
                'category_id' => '2',
            ],

            [
                'name' => 'Ropa',
                'category_id' => '2',
            ],

            [
                'name' => 'Ropa interior',
                'category_id' => '2',
            ],

            [
                'name' => 'Gorras',
                'category_id' => '3',
            ],

            [
                'name' => 'Bolsos',
                'category_id' => '3',
            ],

            [
                'name' => 'Riñoneras',
                'category_id' => '3',
            ],
        ];

        DB::table('subcategories')->insert($rowsProducts);
    }
}
