<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewRecords extends Model
{
    use HasFactory;

    protected $table = "records";
    
    //Timestamps
    public $timestamps = true;

    public $primaryKey = 'record_id';

    protected $fillable = [
        "id_number",
        "fName",
        "mName",
        "lName",
        "file_path"
    ];

    public function record()
    {
        return $this->hasMany('App\Record');
    }

    public function newRecord()
    {
        return $this->belongsTo('App\Record');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
