<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qcm extends Model
{
    use HasFactory;

    protected $table = 'qcm';
    protected $primaryKey = 'id_qcm';

    protected $fillable =['id_chapitre','titre','actif'];


   

}
