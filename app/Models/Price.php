<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    // Asignación masiva
    protected $guarded = ['id'];

    // Relación 1:n Price - Course
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }
}