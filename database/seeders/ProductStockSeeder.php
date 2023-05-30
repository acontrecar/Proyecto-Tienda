<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $rowsProducts = [
            [
                'product_id' => '1',
                'size_id' => '4',
                'quantity' => '10',
            ],

            [
                'product_id' => '1',
                'size_id' => '3',
                'quantity' => '12',
            ],

            [
                'product_id' => '4',
                'size_id' => '3',
                'quantity' => '2',
            ],

            [
                'product_id' => '2',
                'size_id' => '2',
                'quantity' => '9',
            ],

            [
                'product_id' => '2',
                'size_id' => '4',
                'quantity' => '5',
            ],

            [
                'product_id' => '3',
                'size_id' => '1',
                'quantity' => '22',
            ],

            [
                'product_id' => '3',
                'size_id' => '2',
                'quantity' => '2',
            ],

            [
                'product_id' => '3',
                'size_id' => '3',
                'quantity' => '7',
            ],
        ];

        DB::table('products_stock')->insert($rowsProducts);
    }
}
