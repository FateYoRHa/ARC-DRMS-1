<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = "courses";

    public $primaryKey = "courseID";


    protected $fillable = [
        'departmentID',
        'course',
        'course_acronym',
        // 'for_registration_id',
    ];


    public function courses()
    {
        return $this->belongsTo('App\Departments');
    }
}
