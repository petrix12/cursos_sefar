<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    // Relación 1:1 Lesson - Description (inversa)
    public function lesson(){
        return $this->belongsTo('App\Models\Lesson');
    }
}