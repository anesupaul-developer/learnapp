<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstname,
            'lastname' => $this->faker->lastname,
            'gender' => 'female',
            'classname' => 'Form 1A',
            'studentcode' => Str::random(10),
            'dob' => now()
        ];
    }
}
