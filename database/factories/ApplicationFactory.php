<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $applicationNumber = 'APP' . now()->format('YmdHis') . $this->faker->unique()->numberBetween(1000, 9999);

        return [
            'id' => $this->faker->uuid(),
            'application_number' => $applicationNumber,
            'product_id' => null, // Will be set later
            'branch_id' => null, // Will be set later
            'loan_amount' => $this->faker->randomFloat(2, 10000, 1000000),
            'roi' => $this->faker->randomFloat(2, 5, 20),
            'sales_person_id' => $this->faker->numberBetween(1, 10),
            'created_by' => 1, // Assuming admin user
            'updated_by' => 1, // Assuming admin user
            'other_data' => [],
            'status' => 'Lead Initiated',
        ];
    }
}
