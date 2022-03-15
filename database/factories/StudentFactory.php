<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class StudentFactory extends Factory
{
    
/**
     *
     * The name  of the factory´s corresponding model.
     *
     * @var string
     */

    protected $model = Student::class;
    /**
     *
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'family_name'=> $this->faker->lastName(),
            'last_name'=> $this->faker->lastName(),
            'group_id ' =>random_int(1,5),
            'age'=>random_int(17,50),
            'phone'=>random_int(2380000000,2389999999),
            'contact_phone'=>random_int(2380000000,2389999999),
            'email'=> $this->faker->email(),
            'matricula'=>random_int(3419110000,4000000000),
            'password'=> $this->faker->password()
            
            

            
            

        ];
    }
}
