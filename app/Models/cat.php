<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cat extends Model
{
    use HasFactory;
        protected $guarded=['id'];
        //(cat $ courses) one to many
        public function courses(){
            return $this->hasMany('App\Models\Course');
        }
}
