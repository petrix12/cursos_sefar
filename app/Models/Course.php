<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    // Relación 1:1 Course - Observation
    public function observation(){
        return $this->hasOne('App\Models\Observation');
    }

    // Relación 1:n Course - Review
    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }

    // Relación 1:n Course - Requirement
    public function requirements(){
        return $this->hasMany('App\Models\Requirement');
    }

    // Relación 1:n Course - Goal
    public function goals(){
        return $this->hasMany('App\Models\Goal');
    }

    // Relación 1:n Course - Audience
    public function audiences(){
        return $this->hasMany('App\Models\Audience');
    }

    // Relación 1:n Course - Section
    public function sections(){
        return $this->hasMany('App\Models\Section');
    }

    // Relación 1:n Profesores y Cursos (User - Course) (inversa)
    public function teacher(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
    // Relación 1:n Level - Course (inversa)
    public function level(){
        return $this->belongsTo('App\Models\Level');
    }

    // Relación 1:n Category - Course (inversa)
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    // Relación 1:n Price - Course (inversa)
    public function price(){
        return $this->belongsTo('App\Models\Price');
    }

    // Relación n:n Estudiantes y Cursos (User - Course) (inversa)
    public function students(){
        return $this->belongsToMany('App\Models\User');
    }

    //Relacion 1:1 polimórfica Course - Image
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    // Relación entre Course - Lesson y Section como tabla intermedia
    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }
}