<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';
    
    protected $fillable = [
        'name',
        'email', 
        'password',
        'ds_rua',
        'nr_endereco',
        'ds_bairro',
        'ds_complemento',
        'nr_tel',
        'nl_user',
        'nr_cel',
        'im_perfil',
        'link_linkedin',
        'link_facebook',
        'link_twitter',
        'link_site_pessoal',   
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
