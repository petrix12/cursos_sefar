<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    // Asignación masiva
    protected $guarded = ['id'];

    // Ralción 1:n Section -Lesson
    public function lessons(){
        return $this->hasMany('App\Models\Lesson');
    }

    // Relación 1:n Course - Section (inversa)
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}