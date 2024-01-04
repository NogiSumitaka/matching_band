<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $fillable = [
        'name',
        'level',
        'introduction',
        ];
        
    use HasFactory;
    
    public function getPaginateByLimit(int $limit_count = 3)
    {
        return $this->orderBy('updated_at','DESC')->paginate($limit_count);
    }
    
    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
}
