<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inst extends Model
{
    use HasFactory;
    
    public function bands(){
        return $this->belongsToMany(Band::class)->withTimestamps();
    }
    
    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
