<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    // Relación 1:1 Lesson - Description
    public function description(){
        return $this->hasOne('App\Models\Description');
    }

    // Ralción 1:n Section -Lesson (inversa)
    public function section(){
        return $this->belongsTo('App\Models\Section');
    }

    // Ralción 1:n Platform -Lesson (inversa)
    public function platform(){
        return $this->belongsTo('App\Models\Platform');
    }

    // Relacion n:m Lesson - User
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    // Relación 1:1 polimorfica Lesson - Resource
    public function resource(){
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }

    // Relación 1:n polimorfica Lesson - Comment
    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    // Relación 1:n polimorfica Lesson - Reaction
    public function reactions(){
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }
}