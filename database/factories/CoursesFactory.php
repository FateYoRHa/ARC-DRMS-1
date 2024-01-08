<?php

namespace Database\Factories;

use App\Models\Courses;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Departments;
use Illuminate\Support\Facades\DB;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Courses>
 */
class CoursesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    private static $id = 1;
    private static $check = '';
    public function definition()
    {
        $department = 0;
        $course_full = '';
        // $courses = array('DMD','MDE','BSAC','BSBA','BSCRIM','BFSC','BSARCH','BSCE','BSBA-FM','BSBA-HRDM','BSBA-OM','BSBA-MM','BSECE','BSESE', 'BET-Mecha', 'BSCpE', 'BSCS', 'BSIT-ICT', 'ACT-MWD', 'BSHM-IHBO', 'BSHM-PCA', 'BSTM-IT', 'AACACO', 'BS-MLS', 'BS-PT', 'BSN', 'BA-COMM', 'BA-ENGL', 'BA-MUSIC', 'BA-POLSCI', 'BSPSYCH', 'BEED', 'BSED-ENGL', 'MAED-ED MGMT', 'MAED-FIL', 'MA-ENGL', 'MPA', 'J.D.','MIDWIFERY','EDD','DBA', 'PHD-DEVED', 'MSCJSC', 'MCDRRM');
        // $course = array_rand($courses, 1);
        $courses = $this->faker->unique()->randomElement(['DMD','MDE','BSAC','BSBA','BSCRIM','BFSC','BSARCH','BSCE','BSBA-FM','BSBA-HRDM','BSBA-OM','BSBA-MM','BSECE','BSESE', 'BET-MECHA', 'BSCPE', 'BSCS', 'BSIT-ICT', 'ACT-MWD', 'BSHM-IHBO', 'BSHM-PCA', 'BSTM-IT', 'AACACO', 'BS-MLS', 'BS-PT', 'BSN', 'BA-COMM', 'BA-ENGL', 'BA-MUSIC', 'BA-POLSCI', 'BSPSYCH', 'BEED', 'BSED-ENGL', 'MAED-ED MGMT', 'MAED-FIL', 'MA-ENGL', 'MPA', 'J.D.','MIDWIFERY','EDD','DBA', 'PHD-DEVED', 'MSCJSC', 'MCDRRM']);

        // $check = DB::table('courses')->all();
        if($courses == 'DMD')
        {
            $department = DB::table('departments')->where('department_acronym','SOD')->pluck('departmentID')->first();
            // $department = (int)$department;
            $course_full = 'Doctor of Dental Medicine';

        }
        elseif($courses == 'MDE')
        {
            $department = DB::table('departments')->where('department_acronym','SOD')->pluck('departmentID')->first();

            // $department = (int)$department;
            $course_full = 'Master in Dental Education';
        }
        elseif($courses == 'BSAC')
        {
            $department = DB::table('departments')->where('department_acronym','SBAA')->pluck('departmentID')->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Accountancy';
        }
        elseif($courses == 'BSBA')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SBAA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Business Administration';
        }
        elseif($courses == 'BSBA-HRDM')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SBAA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Business Administration Major in Human Resource Development Management';
        }
        elseif($courses == 'BSBA-OM')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SBAA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Business Administration Major in Operations Management';
        }
        elseif($courses == 'BSBA-MM')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SBAA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Business Administration Major in Marketing Management';
        }
        elseif($courses == 'BSBA-FM')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SBAA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Business Administration Major in Financial Management';
        }
        elseif($courses == 'BSCRIM')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SCJPS')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Criminology';
        }
        elseif($courses == 'BFSC')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SCJPS')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Forensic Science';
        }
        elseif($courses == 'BSARCH')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SEA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Architecture';
        }
        elseif($courses == 'BSCE')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SEA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Civil Engineering';
        }
        elseif($courses == 'BSECE')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SEA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Electronics and Communications Engineering';
        }
        elseif($courses == 'BSESE')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SEA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Environmental & Sanitary Engineering';
        }
        elseif($courses == 'BET-MECHA')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SEA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Engineering Technology (Major in Mechatronics)';
        }
        elseif($courses == 'BSCPE')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SIT')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Computer Engineering';
        }
        elseif($courses == 'BSCS')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SIT')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Computer Science';
        }
        elseif($courses == 'BSIT-ICT')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SIT')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Information Technology';
        }
        elseif($courses == 'ACT-MWD')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SIT')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Associate in Computer Technology with Specialization in Multimedia and Web';
        }
        elseif($courses == 'BSHM-IHBO')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SIHTM')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Hospitality Management with Specialization in International Hotel and Business Operations';
        }
        elseif($courses == 'BSHM-PCA')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SIHTM')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Hospitality Management with specialization in Professional Culinary Arts';
        }
        elseif($courses == 'BSTM-IT')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SIHTM')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Tourism Management - International Tourism';
        }
        elseif($courses == 'AACACO')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SIHTM')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Associate of Arts in Culinary Arts Catering Operations';
        }
        elseif($courses == 'BS-MLS')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SNS')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Medical Laboratory Sciences';
        }
        elseif($courses == 'BS-PT')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SNS')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Physical Therapy';
        }
        elseif($courses == 'BSN')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SON')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Nursing';
        }
        elseif($courses == 'BA-COMM')
        {
            $department = DB::table('departments')
            ->where('department_acronym','STELA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Arts in Communication';
        }
        elseif($courses == 'BA-ENGL')
        {
            $department = DB::table('departments')
            ->where('department_acronym','STELA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Arts in English Language';
        }
        elseif($courses == 'BA-MUSIC')
        {
            $department = DB::table('departments')
            ->where('department_acronym','STELA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Arts in Music';
        }
        elseif($courses == 'BSPSYCH')
        {
            $department = DB::table('departments')
            ->where('department_acronym','STELA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Science in Psychology';
        }
        elseif($courses == 'BA-POLSCI')
        {
            $department = DB::table('departments')
            ->where('department_acronym','STELA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Arts in Political Science';
        }
        elseif($courses == 'BEED')
        {
            $department = DB::table('departments')
            ->where('department_acronym','STELA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Elementary Education';
        }
        elseif($courses == 'MIDWIFERY')
        {
            // $department = DB::table('departments')
            // ->where('department','')
            // ->pluck('departmentID')
            // ->first();
            $department = 10;
            $course_full = 'MIDWIFERY';
        }
        elseif($courses == 'BSED-ENGL')
        {
            $department = DB::table('departments')
            ->where('department_acronym','STELA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Bachelor of Secondary Education Major in English';
        }
        elseif($courses == 'MAED-ED MGMT')
        {
            $department = DB::table('departments')
            ->where('department_acronym','STELA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Master of Arts in Education Major Educational Management';
        }
        elseif($courses == 'MAED-FIL')
        {
            $department = DB::table('departments')
            ->where('department_acronym','STELA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Master of Arts in Education Major Filipino';
        }
        elseif($courses == 'MPA')
        {
            $department = DB::table('departments')
            ->where('department_acronym','STELA')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Master in Public Administration';
        }
        elseif($courses == 'MA-ENGL')
        {
            // $department = DB::table('departments')
            // ->where('department_acronym','')
            // ->pluck('departmentID')
            // ->first();
            $department = 10;
            $course_full = 'Master of Arts in English';
        }
        elseif($courses == 'J.D.')
        {
            $department = DB::table('departments')
            ->where('department_acronym','SOL')
            ->pluck('departmentID')
            ->first();
            // $department = (int)$department;
            $course_full = 'Juris Doctor';
        }
        elseif($courses == 'EDD')
        {
            // $department = DB::table('departments')
            // ->where('department','')
            // ->pluck('departmentID')
            // ->first();
            $department = 10;
            $course_full = 'Doctor of Education';
        }
        elseif($courses == 'MSCJSC')
        {
            // $department = DB::table('departments')
            // ->where('department','')MSCJSC (Master of Science in Criminal Justice with Specialization in Criminology)
            // ->pluck('departmentID')
            // ->first();
            $department = 10;
            $course_full = 'Master of Science in Criminal Justice with Specialization in Criminology';
        }
        elseif($courses == 'PHD-DEVED')
        {
            // $department = DB::table('departments')
            // ->where('department','')
            // ->pluck('departmentID')PHD-DEVED (Doctor of Philosophy in Developmental Education)
            // ->first();
            $department = 10;
            $course_full = 'Doctor of Philosophy in Developmental Education';
        }
        elseif($courses == 'DBA')
        {
            // $department = DB::table('departments')DBA (Doctor in Business Administration)
            // ->where('department','')
            // ->pluck('departmentID')
            // ->first();
            $department = 10;
            $course_full = 'Doctor in Business Administration';
        }
        elseif($courses == 'MCDRRM')
        {
            // $department = DB::table('departments')
            // ->where('department','')
            // ->pluck('departmentID')
            // ->first();
            $department = 10;
            $course_full = 'Master in Crisis and Disaster Risk Reduction Management';
        }

        // self::$check = $courses[$course];
        // $check = DB::table('courses')->where('course_acronym','=',$courses[$course])->count();

        return [
            'courseID'=> self::$id++,
            'course' => $course_full,
            'course_acronym' => $courses,
            'departmentID' => $department,
        ];


    }
}
