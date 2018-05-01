<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
	protected $table = 'candidato';

    public $timestamps = false;

	protected $fillable =
    [
    	'cd_cpf',
        'ds_estado_civil',
        'ic_genero',
        'dt_nascimento',
        'ds_nacionalidade',
        'fk_usuario',
        'fk_deficiencia',
    ];


    
    public function curriculo(){
    	return $this->belongsTo('App/Models/Curriculo', 'fk_candidato', 'cd_cpf');
    }

    public function experiencia(){
    	return $this->belongsTo('App/Models/Candidato', 'fk_candidato', 'cd_cpf');
    }
}
