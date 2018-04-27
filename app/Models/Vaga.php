<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $table = 'vaga';
    public $timestamps = false;

    protected $guarded = ['cd_vaga'];

    protected $fillable = [
        'cd_vaga',
        'nm_vaga', 
        'ds_nivel', 
        'ds_localidade', 
        'dt_expiracao', 
        'qt_vagas', 
        'vl_salario_vaga', 
        'ic_vale_transporte', 
        'ic_vale_alimentacao', 
        'ic_plano_saude', 
        'ic_plano_dentario', 
        'ic_seguro_vida', 
        'nm_contratacao', 
        'fk_empresa', 
        'fk_perfil_vaga', 
        'fk_area_ti'
	];
    

    /*
    public function empresa(){
        return $this->belongsTo('App\Models\Empresa');
    }
    public function areaTI(){
        return $this->belongsTo('App\Models\AreaTI');
    }
    public function perfilVaga(){
        return $this->belongsTo('App\Models\PerfilVaga');
    }
    */
}
