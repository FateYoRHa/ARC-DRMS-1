<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPreviousSchools extends Model
{
    use HasFactory;
    protected $table = "student_previous_schools";

    //Timestamps
    public $timestamps = true;

    public $primaryKey = 'registration_id';

    protected $fillable = [
        "id",
        "last_school_name",//Last School Attended (Full name)
        "year_graduated",
        "prev_sch_bnlb",//Building number or Lot/Blk/Phase
        "prev_school_bname",//Building Name
        "prev_sch_str_name",//Street Name
        "prev_sch_brngy_name",//Barangay Name
        "prev_sch_city_town",//Town or City Name
        "prev_sch_prov",
        "prev_sch_reg",
        "prev_sch_country",
        "prev_sch_zip",

    ];


    // public function passports()
    // {
    //     return $this->belongsTo('App\Students');
    // }
    public function studentpreviousschools()
    {
        return $this->hasMany('App\Students');
    }
    public function students()
    {
        return $this->belongsTo(Students::class);
    }

    public function newstudents()
    {
        return $this->belongsTo('App\StudentRegistration');
    }
}
