<?php

namespace Database\Factories;

use App\Models\Donhang;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonhangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Donhang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tennguoigui' => $this->faker->name(),
            'sodienthoainguoigui' => "09".rand(10000000,99999999),
            'diachinguoigui' => $this->faker->address(),
            'emailnguoigui' => $this->faker->unique()->safeEmail(),
            'tennguoinhan' => $this->faker->name(),
            'sodienthoainguoinhan' => "09".rand(10000000,99999999),
            'diachinguoinhan' => $this->faker->address(),
            'emailnguoinhan' => $this->faker->unique()->safeEmail(),
            'id_hinhthucgui' => rand(1,2),
        ];
    }
}
