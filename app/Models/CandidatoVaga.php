<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatoVaga extends Model
{
    protected $table = 'candidato_vaga';
    public $timestamps = false;
    protected $fillable = [
    	'fk_candidato',
    	'fk_vaga',
    ];
    
    
}
