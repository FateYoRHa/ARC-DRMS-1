<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploads extends Model
{
    use HasFactory;

    protected $table = "uploads";

    protected $fillable = [
        'name',
        'filepath',
        'id_record',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function uploads() {
        return $this->belongsTo('App\Records');
    }
}
