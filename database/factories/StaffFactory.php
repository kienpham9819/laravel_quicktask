<?php

namespace Database\Factories;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StaffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Staff::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name,
            'gender' => 1,
            'address' => $this->faker->address,
            'birthday' => $this->faker->date,
            'avatar' => $this->faker->imageUrl,
            'department_id' => $this->faker->numberBetween(1,4),
        ];
    }
}
