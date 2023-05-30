<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /*
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('image');
            $table->unsignedBigInteger('subcategory_id');
        */
        $rowsProducts = [
            [
                'name' => 'Camiseta de futbol',
                'description' => 'Gran camiseta de futbol',
                'price' => '12.99',
                'image' => 'https://www.futbolemotion.com/imagesarticulos/154648/grandes/camiseta-adidas-real-madrid-primera-equipacion-2020-2021-white-tech-ink-0.jpg',
                'subcategory_id' => '2',
            ],

            [
                'name' => 'Camiseta de nike',
                'description' => 'Gran camiseta de nike',
                'price' => '12.99',
                'image' => 'https://www.futbolemotion.com/imagesarticulos/154648/grandes/camiseta-adidas-real-madrid-primera-equipacion-2020-2021-white-tech-ink-0.jpg',
                'subcategory_id' => '2',
            ],

            [
                'name' => 'Zapatos retro',
                'description' => 'Zapatilla buenardas',
                'price' => '12.99',
                'image' => 'https://www.futbolemotion.com/imagesarticulos/154648/grandes/camiseta-adidas-real-madrid-primera-equipacion-2020-2021-white-tech-ink-0.jpg',
                'subcategory_id' => '1',
            ],

            [
                'name' => 'Ropa sexy',
                'description' => 'Ropa sexy para mujeres',
                'price' => '12.99',
                'image' => 'https://www.futbolemotion.com/imagesarticulos/154648/grandes/camiseta-adidas-real-madrid-primera-equipacion-2020-2021-white-tech-ink-0.jpg',
                'subcategory_id' => '6',
            ],

        ];

        DB::table('products')->insert($rowsProducts);
    }
}
