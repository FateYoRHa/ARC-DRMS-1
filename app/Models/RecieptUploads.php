<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecieptUploads extends Model
{
    use HasFactory;
    //Timestamps
    public $timestamps = true;

    protected $table = "reciept_uploads";

    public $primaryKey = "upload_id";


    protected $fillable = [
        'upload_id',
        'student_id',
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
