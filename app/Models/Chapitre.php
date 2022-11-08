<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    use HasFactory;

    protected $table = 'chapitre';
    protected $primaryKey = 'id_chapitre';

    protected $fillable =['nom','id_matiere'];
}
