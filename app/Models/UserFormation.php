<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserFormation extends Authenticatable
{
    use HasFactory;

    protected $table = 'user_formation';
    // protected $primaryKey = 'id_formation','id_utilisateur';

    protected $fillable = ['id_formation','id_utilisateur'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}