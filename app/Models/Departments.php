<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = "departments";

    public $primaryKey = "departmentID";


    protected $fillable = [
        'department',
        'department_acronym',
    ];


    public function department()
    {
        return $this->hasMany('App\Courses');
    }
}
