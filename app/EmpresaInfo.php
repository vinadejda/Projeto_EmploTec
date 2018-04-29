<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaInfo extends Model
{
    protected $table = 'empresa';

    public $timestamps = false;

    protected $guarded = ['cd_cnpj'];

    protected $fillable = [
        'cd_cnpj',
        'ds_razao_social',  
        'fk_usuario',
        'ic_ativo',
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


