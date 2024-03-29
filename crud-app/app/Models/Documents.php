<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;

    protected $dates= ['date'];   
    protected $guarded= ['date'];   

    public function user() {
        return $this->belongsTo(('App\Models\User'));
     }

    public function users() {
        return $this->belongsToMany(('App\Models\User'));
     }
}
