<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requeriment extends Model
{
    use HasFactory;

    // Relación 1:n Course - Requeriment (inversa)
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}