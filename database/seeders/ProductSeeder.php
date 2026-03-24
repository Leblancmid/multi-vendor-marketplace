<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $vendor = Vendor::first();
        $category = Category::first();

        if (! $vendor || ! $category) {
            return;
        }

        $products = [
            ['name' => 'Wireless Mouse', 'price' => 799.00, 'stock' => 20, 'sku' => 'WM-001'],
            ['name' => 'Mechanical Keyboard', 'price' => 2499.00, 'stock' => 10, 'sku' => 'MK-001'],
            ['name' => 'USB-C Hub', 'price' => 1299.00, 'stock' => 15, 'sku' => 'UCH-001'],
        ];

        foreach ($products as $item) {
            Product::updateOrCreate(
                ['sku' => $item['sku']],
                [
                    'vendor_id' => $vendor->id,
                    'category_id' => $category->id,
                    'name' => $item['name'],
                    'slug' => Str::slug($item['name']),
                    'description' => $item['name'] . ' description',
                    'price' => $item['price'],
                    'stock' => $item['stock'],
                    'is_active' => true,
                ]
            );
        }
    }
}
