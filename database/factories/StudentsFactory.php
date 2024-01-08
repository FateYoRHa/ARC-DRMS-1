<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use App\Models\Courses;
use Faker\Extension\CountryExtension;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Students>
 */
class StudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    private static $registration_id = 1;
    public function definition()
    {
        $student_id = 0;
        $fname = $this->faker->firstName();
        $mname = $this->faker->lastName();
        $lname = $this->faker->lastName();

    //>>>>>>>>>>>>>>>>>>>> IF ELSE FOR ENTRANCE STATUS + Student ID <<<<<<<<<<<<<<<<<<<<<
        $entrance_status = $this->faker->randomElement(['returning_first_year','transferee','incoming_first_year']);

        if($entrance_status == 'returning_first_year')
        {
            $student_id = $this->faker->unique()->numberBetween(20150000, 29999999);
        }
        else
        {
            $student_id = null;
        }
        $course = DB::table('courses')->pluck('course_acronym')->all();

        $program = $this->faker->randomElements($course);

        $course = implode($program);

        $department_query = Courses::join('departments','departments.departmentID','=','courses.departmentID')
                                    ->where('courses.course_acronym','=',$course)
                                    ->first();

        $department = $department_query->department_acronym;
        // dd($department);
        $country = $this->faker->randomElement(['Philippines','Japan','United States','South Korea','China','Taiwan']);
        $nationality = '';
        if($country == 'Philippines')
        {
            $nationality = 'Filipino';
        }
        elseif($country == 'Japan')
        {
            $nationality = 'Japanese';
        }
        elseif($country == 'United States')
        {
            $nationality = 'American';
        }
        elseif($country == 'South Korea')
        {
            $nationality = 'South Korean';
        }
        elseif($country == 'China')
        {
            $nationality = 'Chinese';
        }
        elseif($country == 'Taiwan')
        {
            $nationality = 'Taiwanese';
        }

        // $department = $department_query->where()
    //     "program",
    //     "nationality",
    //     "department",

    //     "address",
    //     "email",
    //     "pnum",
    //     "city_prov",
    //     "brngy_town",
    //     "student_upload_id",
    //     'status'

        return [
            'registration_id'=> self::$registration_id++,
            'entrance_status' => $entrance_status,
            'student_id' => $student_id,
            'fname' => $fname,
            'mname' => $mname,
            'lname' => $lname,
            'course' => $course,
            'department' => $department,
            'nationality' => $nationality,
            // 'country' => $country,
            'address' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail,
            'pnum' => $this->faker->unique()->numberBetween(9000000000, 9999999999),
            'city_prov' => $this->faker->city(),
            'brngy_town' => $this->faker->city(),
            'status' => $this->faker->randomElement(['pending','for id','for approval','for encoding/enrollment','registered','dropped'])

        ];
    }
}
