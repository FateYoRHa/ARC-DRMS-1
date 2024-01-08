<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationUploads extends Model
{
    use HasFactory;

    //Timestamps
    public $timestamps = true;

    protected $table = "registration_uploads";

    public $primaryKey = "registration_id";


    protected $fillable = [
        // 'student_id',
        'filename',
        'filepath',
        // 'for_registration_id',
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
    public function registration_uploads()
    {
        return $this->belongsTo('App\RegistrationUploads');
    }
}
