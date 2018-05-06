<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    protected $table = 'pergunta';
    public $timestamps = false;
    protected $guarded = ['cd_pergunta'];
    
    protected $fillable = [
   		'ds_pergunta',
   		'fk_areaTI'
    ];
    public function areaTI(){
        return $this->hasOne('App\Models\AreaTI', 'cd_areaTI','fk_areaTI');
    }

    public function alternativa(){
		return $this->belongsTo('App\Models\Alternativa','fk_pergunta', 'cd_pergunta');
	}
}
