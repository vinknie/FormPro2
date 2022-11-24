<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $table = 'formation';
    protected $primaryKey = 'id_formation';

    protected $fillable =['nom','date_debut','date_fin'];


    // public function users(){
    //     return $this->belongsToMany(User::class);
    // }
}
