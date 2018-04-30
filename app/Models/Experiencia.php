<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    protected $table = 'experiencia';

    public $timestamps = false;

	protected $fillable =
    [
        'nm_cargo_experiencia',
        'ds_experiencia',
        'nm_empresa',
        'ds_segmento_empresa',
        'vl_salario',
        'dt_inicio_experiencia',
        'dt_termino_experiencia',
        'fk_candidato',

    	
    ];
    protected $guarded = ['cd_experiencia'];

    public function candidato(){
    	return $this->hasMany('employ\Models\Candidato');
    }
}
