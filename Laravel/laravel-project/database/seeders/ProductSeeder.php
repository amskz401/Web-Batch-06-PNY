<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $product = new Product();
        // $product->title = "Oppo F21";
        // $product->stock = 10;
        // $product->price = 25000;
        // $product->save();
        Product::factory()->count(1000)->create();
    }
}