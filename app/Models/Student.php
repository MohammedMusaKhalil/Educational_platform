<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    //(student &courses) many to many
    protected $guarded=['id'];
    public function courses(){
        return $this->belongsTo('App\Models\Course');
    }

}
