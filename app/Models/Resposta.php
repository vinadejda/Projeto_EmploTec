<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
     protected $table = 'resposta';
    public $timestamps = false;
    
    
    protected $fillable = [
		'ic_resposta',	
		'dt_realizado',
		'fk_cpf',
		'fk_alternativa',
    ];
}
