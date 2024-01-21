<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $fillable = [
        'creater_id',
        'name',
        'image',
        'level',
        'introduction',
        ];
        
    use HasFactory;
    
    public function getPaginateByLimit(int $limit_count = 3)
    {
        return $this->orderBy('updated_at','DESC')->paginate($limit_count);
    }
    
    public function users(){
        return $this->belongsTo(User::class);
    }
    
    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
    
    public function prefectures(){
        return $this->belongsToMany(Prefecture::class);
    }
    
    public function insts(){
        return $this->belongsToMany(Inst::class);
    }
    
    public function applications(){
        return $this->belongsToMany(Application::class, 'applications', 'band_id', 'user_id')->withTimestamps();
    }
    
    public function messages(){
        return $this->belongsToMany(Message::class, 'messages', 'band_id', 'user_id')->withTimestamps();
    }
}
