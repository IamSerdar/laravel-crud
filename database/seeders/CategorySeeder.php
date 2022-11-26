<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                'name' => 'Electronics',
                'parent_id' => null
            ],
            [
                'name' => 'Clothes',
                'parent_id' => null
            ],
            [
                'name' => 'Shoes',
                'parent_id' => null
            ],
            [
                'name' => 'Computers',
                'parent_id' => 1
            ],
            [
                'name' => 'Phones',
                'parent_id' => 1
            ],
        ];

        foreach($data as $item){
            Category::create([
                'name' => $item['name'],
                'parent_id' => $item['parent_id']
            ]);
        }
    }
}
