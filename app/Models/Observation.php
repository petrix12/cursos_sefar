<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;

    // Relación 1:1 Course - Observation (inversa)
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}