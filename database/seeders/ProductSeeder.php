<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->create([
            'name' => 'Bert',
            'price' => 20,
            'category' => 'Animals',
            'image' => 'https://picsum.photos/200/300',
        ]);
    }
}
