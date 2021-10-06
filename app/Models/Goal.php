<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    // Relación 1:n Course - Goal (inversa)
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}