<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qcm extends Model
{
    use HasFactory;

    protected $table = 'examenquestion';
    protected $primaryKey = 'id_examenQuestion';

    protected $fillable =['question','reponse1','reponse2','reponse3','reponse4','id_qcmexamen'];


   

}
