<?php

namespace App\Seeders;

use App\Models\Employees;
use Faker\Factory;

class EmployeeSeeder
{
    public function run()
    {
        $faker = Factory::create('en_IN');

        for ($i = 1; $i <= 100; $i++) {

            $employee = new Employees();

            $employee->assign([
                'first_name' => $faker->firstName,
                'last_name'  => $faker->lastName,
                'email'      => $faker->unique()->safeEmail,
                'location'   => $faker->city,
                'phone_number' => $faker->numerify('9#########')
            ]);

            $employee->save();
            
        }

        echo "Employee SeedingDone";
    }
}
