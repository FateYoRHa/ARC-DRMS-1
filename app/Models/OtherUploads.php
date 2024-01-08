<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherUploads extends Model
{
    use HasFactory;
    protected $table = "other_uploads";

    //Timestamps
    public $timestamps = true;
    public $primaryKey = "id";


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
}
