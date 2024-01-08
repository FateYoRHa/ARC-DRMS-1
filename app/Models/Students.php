<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $table = "students";

    //Timestamps
    public $timestamps = true;

    public $primaryKey = 'registration_id';

    protected $fillable = [
        // "registration_id",
        "entrance_status",
        "student_id",
        "fname",
        "mname",
        "lname",
        "course",
        "nationality",
        "department",
        // "passport_num", //PASSPORT NUMBER
        // "dpissued",//PASSPORT DATE ISSUED
        // "dpexpiry",//PASSPORT DATE EXPIRY
        // "acr_icard_num",//ACR-ICARD Number
        // "last_school_name",//Last School Attended (Full name)
        // "year_graduated",
        // "prev_sch_bnlb",//Building number or Lot/Blk/Phase
        // "prev_school_bname",//Building Name
        // "prev_sch_str_name",//Street Name
        // "prev_sch_brngy_name",//Barangay Name
        // "prev_sch_city_town",//Town or City Name
        // "prev_sch_prov",
        // "prev_sch_reg",
        // "prev_sch_country",
        // "prev_sch_zip",
        "address",
        "email",
        "pnum",
        "city_prov",
        "brngy_town",
        "student_upload_id",
        'status',
        'school',
        'data'
        //YES date and school is ALREADY IN ANOTHER TABLE, and it was intentional since I couldnt find a way to join two tables and be able to search(you need to manually edit/add) and i was not able to understand how to do so :> so GL
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function students()
    {
        return $this->belongsTo('App\Students');
    }
    public function newstudents()
    {
        return $this->belongsTo('App\StudentRegistration');
    }
    public function student_uploads()
    {
        return $this->hasMany('App\Models\RegistrationUploads');
    }
    public function passports()
    {
        return $this->hasOne('App\Models\StudentPassports');
    }
    public function school()
    {
        return $this->hasOne(StudentPreviousSchools::class);
    }
    public function course()
    {
        return $this->hasOne('App\Models\Courses');
    }
    public function department()
    {
        return $this->hasOne('App\Models\Departments');
    }
}
