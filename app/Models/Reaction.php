<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    // Asignación masiva
    protected $guarded = ['id'];

    // Constantes de apreciación del curso
    const LIKE = 1;
    const DISLIKE = 2;

    // Relación 1:n User - Reaction (inversa)
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Relación polimórfica
    public function reactionable(){
        return $this->morphTo();
    }
}