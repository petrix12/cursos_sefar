<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Asignación masiva
    protected $guarded = ['id'];

    // Relación 1:n User - Reaction (inversa)
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Relación 1:n polimorfica
    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    // Relación 1:n polimorfica
    public function reactions(){
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }

    // Relación polimórfica
    public function commentable(){
        return $this->morphTo();
    }
}