<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Relación 1:n Category - Course
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }
}