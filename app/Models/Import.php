<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
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
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
