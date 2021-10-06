<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    // Ralación 1:n Platform -Lesson
    public function lessons(){
        return $this->hasMany('App\Models\Lesson');
    }
}