<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Empresa extends Authenticatable
{
    use Notifiable;

    protected $table = 'empresa';
    
    public $timestamps = false;

    protected $fillable = [
        'cd_cnpj', 
        'ds_razao_social',
        'fk_usuario'         
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function vaga(){
        return $this->belongsTo('App\Models\Empresa','fk_empresa', 'cd_cnpj');
    }
}
