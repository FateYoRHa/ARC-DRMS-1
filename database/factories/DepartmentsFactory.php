<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Departments;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departments>
 */
class DepartmentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    private static $id = 1;
    public function definition()
    {
        $department_full = '';
        $department = $this->faker->unique()->randomElement(['SBAA','SCJPS','SOD','SEA','SIT','SIHTM','SNS','SON','STELA','GS','SOL']);

        if($department == 'SBAA')
        {
            $department_full = 'School of Business Administration & Accountancy';
        }
        elseif($department == 'SCJPS')
        {
            $department_full = 'School of Criminal Justice & Public Safety';
        }
        elseif($department == 'SOD')
        {
            $department_full = 'School of Dentistry';
        }
        elseif($department == 'SEA')
        {
            $department_full = 'School of Engineering & Architecture';
        }
        elseif($department == 'SIT')
        {
            $department_full = 'School of Information Technology';
        }
        elseif($department == 'SIHTM')
        {
            $department_full = 'School of International Hospitality and Tourism Management';
        }
        elseif($department == 'SNS')
        {
            $department_full = 'School of Natural Sciences';
        }
        elseif($department == 'SON')
        {
            $department_full = 'School of Nursing';
        }
        elseif($department == 'STELA')
        {
            $department_full = 'School of Teacher Education & Liberal Arts';
        }
        elseif($department == 'GS')
        {
            $department_full = 'Graduate School';
        }
        elseif($department == 'SOL')
        {
            $department_full = 'School of Law';
        }



        return [
            'departmentID'=> self::$id++,
            'department' => $department_full,
            'department_acronym' => $department,
        ];
    }
}
