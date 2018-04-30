<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
    protected $table = 'curriculo';

    public $timestamps = false;

	protected $fillable =
    [
    	'ds_objetivo_profissional',
    	'vl_prentencao_salarial',
    	'ds_info_complementar',
    	'ds_resumo_profissional',
    	'fk_candidato',

    ];

    protected $guarded = ['cd_curriculo'];
}
