<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\MasterProduct;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $products = [
            'Home Loan',
            'Loan Against Property',
            'Vehicle Loan',
            'Loan Against Property (Finserve)',
        ];

        foreach ($products as $product) {
            MasterProduct::create([
                'id' => Str::uuid(),
                'slug' => Str::slug($product),
                'name' => $product,
                'code' => 'MP' . str_pad(MasterProduct::count() + 1, 8, '0', STR_PAD_LEFT),
                'is_active' => true,
            ]);
        }

        $branches = [
            'Jaipur',
            'Delhi',
            'Mumbai',
            'Bangalore',
            'Chennai',
        ];

        foreach ($branches as $branch) {
            \App\Models\MasterBranch::create([
                'id' => Str::uuid(),
                'slug' => Str::slug($branch),
                'name' => $branch,
                'code' => 'BR' . str_pad(\App\Models\MasterBranch::count() + 1, 8, '0', STR_PAD_LEFT),
                'is_active' => true,
            ]);
        }

        $customerTypes = [
            'Applicant',
            'Co-Applicant',
            'Guarantor',
        ];

        foreach ($customerTypes as $type) {
            \App\Models\MasterCustomerType::create([
                'id' => Str::uuid(),
                'slug' => Str::slug($type),
                'name' => $type,
                'code' => 'CT' . str_pad(\App\Models\MasterCustomerType::count() + 1, 8, '0', STR_PAD_LEFT),
                'is_active' => true,
            ]);
        }
    }
}
