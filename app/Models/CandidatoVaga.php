<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatoVaga extends Model
{
    protected $table = 'candidato_vaga';
    public $timestamps = false;
    protected $fillable = [
    	'fk_candidato',
    	'fk_vaga',
    ];
    
    public function candidato(){
        return $this->hasOne('App\Models\Candidato', 'cd_cpf','fk_candidato');
    }
    public function vaga(){
        return $this->hasOne('App\Models\Vaga', 'cd_vaga','fk_vaga');
    }
}
