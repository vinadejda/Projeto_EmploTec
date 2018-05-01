<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deficiencia extends Model
{
    protected $table= 'deficiencia';
    public $timestamps = false;
    protected $guarded = ['cd_deficiencia'];

    protected $fillable =['nm_deficiencia'];




}
