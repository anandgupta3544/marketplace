<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Application;
use Illuminate\Support\Str;

class SalesFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // creates 10 applications along with customer, product, and branch
        Application::factory(5000)->create()->each(function ($application) {
            $application->customer()->create([
                'id' => Str::uuid(),
                'customer_type_id' => \App\Models\MasterCustomerType::inRandomOrder()->first()->id,
                'firt_name' => fake()->firstName(),
                'last_name' => fake()->lastName(),
                'email' => fake()->safeEmail(),
                'mobile' => fake()->phoneNumber(),
            ]);

            $application->product()->associate(\App\Models\MasterProduct::inRandomOrder()->first());
            $application->branch()->associate(\App\Models\MasterBranch::inRandomOrder()->first());
            $application->save();
        });
    }
}
