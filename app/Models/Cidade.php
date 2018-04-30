<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
	protected $table = 'cidade';
    public $timestamps = false;

    protected $fillable = [
    	'cd_cidade', 
    	'nm_cidade', 
    	'fk_estado'
    ];
    public function vaga(){
		return $this->belongsTo('App\Models\Vaga','fk_cidade', 'cd_cidade');
	}
}
