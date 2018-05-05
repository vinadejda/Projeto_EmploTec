<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaTI extends Model
{
    protected $table = 'area_ti';
    public $timestamps = false;
    protected $guarded = ['cd_areaTI'];
    
    protected $fillable = [
    	'nm_areaTI'
    ];
    public function vaga(){
		return $this->belongsTo('App\Models\Vaga','fk_area_ti', 'cd_areaTI');
	}
	public function pergunta(){
		return $this->belongsTo('App\Models\Pergunta','fk_area_ti', 'cd_areaTI');
	}
}
