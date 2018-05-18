<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $table = 'vaga';
    public $timestamps = false;

    protected $guarded = ['cd_vaga'];

    protected $fillable = [
        'nm_vaga', 
        'ds_nivel', 
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
        'fk_area_ti',
        'fk_cidade'
	];
    
    public function cidade(){
        return $this->hasOne('App\Models\Cidade', 'cd_cidade','fk_cidade');
    }
    public function empresa(){
        return $this->hasOne('App\Models\Empresa', 'cd_cnpj','fk_empresa');
    }
    public function areaTI(){
        return $this->hasOne('App\Models\AreaTI', 'cd_areaTI','fk_area_ti');
    }
    
    public function perfilVaga(){
        return $this->belongsTo('App\Models\PerfilVaga','fk_vaga', 'cd_vaga');
    }

    public function candidatoVaga(){
        return $this->belongsToMany('App\Models\CandidatoVaga','fk_vaga', 'cd_vaga');
    }
}
