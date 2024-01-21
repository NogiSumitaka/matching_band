<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'introduction',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function bands(){
        return $this->hasMany(Band::class);
    }
    
    public function genres(){
        return $this->belongsToMany(Genre::class)->withTimestamps();
    }
    
    public function prefectures(){
        return $this->belongsToMany(Prefecture::class)->withTimestamps();
    }
    
    public function insts(){
        return $this->belongsToMany(Inst::class)->withTimestamps();
    }
    
    public function messages(){
        return $this->belongsToMany(Message::class, 'messages', 'user_id', 'band_id')->withTimestamps();
    }
    
    public function applications(){
        return $this->belongsToMany(Application::class, 'applications', 'user_id', 'band_id')->withTimestamps();
    }
}
