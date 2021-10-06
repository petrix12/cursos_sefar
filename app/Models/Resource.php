<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    // Asignación masiva
    protected $guarded = ['id'];

    // Relación polimófica
    public function resourceable(){
        return $this->morphTo();
    }
}