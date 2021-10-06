<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Relación 1:1 User - Profile (Inversa)
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
