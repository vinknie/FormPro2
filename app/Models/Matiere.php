<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $table = 'matiere';
    protected $primaryKey = 'id_matiere';

    protected $fillable =['nom','id_formation','id_utilisateurs'];
}