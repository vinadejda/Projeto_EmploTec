<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estado';
    public $timestamps = false;

    protected $fillable = [
    	'cd_estado', 
    	'nm_estado', 
    	'sg_estado'
    ];
    
	public function candidato(){
		return $this->belongsTo('App\Cidade', 'fk_estato', 'cd_estado');
	}
}
