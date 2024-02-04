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
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
    
    public function prefectures()
    {
        return $this->belongsToMany(Prefecture::class);
    }
    
    public function insts()
    {
        return $this->belongsToMany(Inst::class);
    }
    
    public function applications()
    {
        return $this->belongsToMany(User::class, 'applications', 'band_id', 'user_id');/*->withTimestamps();*/
    }
    
    public function messages()
    {
        return $this->belongsToMany(User::class, 'messages', 'band_id', 'user_id')->withPivot(['user_to_band', 'message', 'updated_at'])->withTimestamps();
    }
    
    /*inst, genre, prefectureのパラメータを用いて該当するbandを取得*/
    public function getSearchingBands($inst = null, $genre = null, $prefecture = null) 
    {
        $results = $this->whereHas('insts', function ($query) use ($inst) {
                $query->where('inst_id', $inst);
            })->whereHas('genres', function ($query) use ($genre) {
                $query->where('genre_id', $genre);
            })->whereHas('prefectures', function ($query) use ($prefecture) {
                $query->where('prefecture_id', $prefecture);
            })->orderBy('updated_at','DESC')->paginate(3);
            
        return $results;
    }
}
