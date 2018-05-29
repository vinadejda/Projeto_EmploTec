<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerguntaCandidato extends Model
{
    
    protected $table = 'pergunta_candidato';
    public $timestamps = false;
    
    
    protected $fillable = [
   		'fk_pergunta',
   		'fk_cpf',
    ];
}
