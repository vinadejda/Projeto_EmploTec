<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfilVaga extends Model
{
    protected $table = 'perfil_vaga';
    public $timestamps = false;
    protected $guarded = ['cd_perfil_vaga'];
    
    protected $fillable = [
    	'nm_perfil_vaga',
    	'ds_genero',
    	'nr_idade',
    	'ds_interresse',
    	'ds_formacao',
    	'fk_vaga'
    ];
    public function vaga(){
        return $this->hasOne('App\Models\Vaga', 'cd_vaga','fk_vaga');
    }
}
