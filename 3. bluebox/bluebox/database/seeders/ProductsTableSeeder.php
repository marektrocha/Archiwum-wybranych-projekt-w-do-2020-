<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // PRODUCT 1
        DB::table('products')->insert([
            'name'=>'Product 1',
            'content'=>'Content about product 1',
            'amount'=>4,
            'price'=>100,
            'statusProduct'=>'Avability'
        ]);

        // PRODUCT 2
        DB::table('products')->insert([
            'name'=>'Product 2',
            'content'=>'Content about product 2',
            'amount'=>12,
            'price'=>90,
            'statusProduct'=>'Avability'
        ]);

        // PRODUCT 5
        DB::table('products')->insert([
            'name'=>'Product 5',
            'content'=>'Content about product 5',
            'amount'=>0,
            'price'=>110,
            'statusProduct'=>'Avability'
        ]);

        // PRODUCT 7
        DB::table('products')->insert([
            'name'=>'Product 7',
            'content'=>'Content about product 7',
            'amount'=>6,
            'price'=>120,
            'statusProduct'=>'Avability'
        ]);

        // PRODUCT 8
        DB::table('products')->insert([
            'name'=>'Product 8',
            'content'=>'Content about product 8',
            'amount'=>2,
            'price'=>130,
            'statusProduct'=>'Avability'
        ]);
    }
}
