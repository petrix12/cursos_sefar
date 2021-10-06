<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Asignación masiva
    protected $guarded = ['id'];

    // Relación 1:n User - Review (inversa)
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Relación 1:n Course - Review (inversa)
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}