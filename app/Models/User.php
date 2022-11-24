<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'utilisateurs';
    protected $primaryKey = 'id';

    protected $fillable =['prenom','nom','email','username','password','status','role','telephone','niveau','sexe','adresse','complementAdresse','codePostal','ville','pays','date_naissance'];



    // public function formations(){
    //     return $this->belongsToMany(Formation::class);
    // }
}