<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VendorSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'vendor1@example.com'],
            [
                'name' => 'Vendor One',
                'password' => Hash::make('password123'),
                'role' => 'vendor',
            ]
        );

        Vendor::updateOrCreate(
            ['user_id' => $user->id],
            [
                'store_name' => 'Vendor One Store',
                'slug' => Str::slug('Vendor One Store'),
                'description' => 'Demo vendor store',
                'phone' => '09123456789',
                'status' => 'approved',
            ]
        );
    }
}
