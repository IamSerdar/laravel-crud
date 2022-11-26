<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'category_id' => 4,
                'name' => 'Dell Vostra',
                'price' => 100000
            ],
            [
                'category_id' => 4,
                'name' => 'Asus VivoBook',
                'price' => 200000
            ],
            [
                'category_id' => 4,
                'name' => 'Asus Zenbook',
                'price' => 200000
            ],
            [
                'category_id' => 5,
                'name' => 'Iphone 14 pro',
                'price' => 30000
            ],
            [
                'category_id' => 5,
                'name' => 'Samsung S22 Ultra',
                'price' => 40000
            ],
        ];

        foreach($data as $item){
            Product::create([
                'category_id' => $item['category_id'],
                'name' => $item['name'],
                'price' => $item['price']
            ]);
        }
    }
}
