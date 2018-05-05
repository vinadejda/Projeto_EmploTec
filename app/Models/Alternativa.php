<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model
{
    protected $table = 'alternativa';
    public $timestamps = false;
    protected $guarded = ['cd_alternativa'];
    
    protected $fillable = [
   		'ds_alternativa',
   		'ic_alternativa',
   		'fk_pergunta'

    ];
    public function Pergunta(){
        return $this->hasOne('App\Models\Pergunta', 'cd_pergunta','fk_pergunta');
    }
}
