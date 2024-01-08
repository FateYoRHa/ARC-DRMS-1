<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPassports extends Model
{
    use HasFactory;
    protected $table = "student_passports";

    //Timestamps
    public $timestamps = true;

    public $primaryKey = 'registration_id';


    protected $fillable = [
        "id",
        "student_id",
        "passport_num", //PASSPORT NUMBER
        "dpissued",//PASSPORT DATE ISSUED
        "dpexpiry",//PASSPORT DATE EXPIRY
        "acr_icard_num",//ACR-ICARD Number
    ];


    public function studentpassports()
    {
        return $this->belongsTo('App\StudentPassports','foreign_key');
    }
    // public function prev_school()
    // {
    //     return $this->belongsTo('App\StudentPreviousSchools');
    // }
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
}
