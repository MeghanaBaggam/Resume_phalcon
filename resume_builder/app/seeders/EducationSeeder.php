<?php

namespace App\Seeders;

use App\Models\Employees;
use App\Models\Educations;
use Faker\Factory;
use Phalcon\Di\Di;

class EducationSeeder
{
    public function run()
    {
        // Faker
        $faker = Factory::create('en_IN');

        // Degree options
        $degrees = [
            'B.Tech (CSE)',
            'B.Tech (ECE)',
            'B.Tech (IT)',
            'B.Tech (EEE)',
            'B.Tech (Mech)',
            'B.Tech (Civil)',
        ];

        // Fetch all employees
        $employees = Employees::find();

        // Get Phalcon Models Manager
        $modelsManager = Di::getDefault()->get('modelsManager');

        $count = 0;

        foreach ($employees as $emp) {

            // Your Employees primary key
            $employeeId = $emp->id;

            $modelsManager->executeQuery(
                'DELETE FROM App\Models\Educations WHERE employee_id = :id:',
                [
                    'id' => $employeeId
                ]
            );

            $interStart = $faker->numberBetween(1990, 2020);

            $intermediate = new Educations();

            $intermediate->employee_id = $employeeId;
            $intermediate->degree      = 'Intermediate';
            $intermediate->institute   = $faker->company . ' Junior College';
            $intermediate->start_year  = $interStart;
            $intermediate->end_year    = $interStart + 2;
            $intermediate->percentage  = $faker->randomFloat(2, 65, 95);

            if (!$intermediate->save()) {

                echo "Failed Intermediate for Employee {$employeeId}\n";

                foreach ($intermediate->getMessages() as $msg) {
                    echo " - {$msg}\n";
                }
                continue;
            }

            $degree = new Educations();
            $degree->employee_id = $employeeId;
            $degree->degree      = $faker->randomElement($degrees);
            $degree->institute   = $faker->company . ' Engineering College';
            $degree->start_year  = $interStart + 2;
            $degree->end_year    = $interStart + 6;
            $degree->percentage  = $faker->randomFloat(2, 60, 90);

            if (!$degree->save()) {

                echo "Failed Degree for Employee {$employeeId}\n";

                foreach ($degree->getMessages() as $msg) {
                    echo " - {$msg}\n";
                }

            } else {

                $count += 2;
            }
        }

        echo "Education Seeding done";
    
    }
}
