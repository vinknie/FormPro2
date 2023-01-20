<?php

namespace App\Models;
use App\Models\Option;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{

    protected $table = 'result';

    protected $primaryKey = 'id_result';
    
    protected $fillable = ['id_option', 'id_utilisateur'];


    public function option() {
        return $this->belongsTo(Option::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
