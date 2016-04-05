<?php

namespace App\Core\Entities;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    protected $table="permisos";
    protected $fillable=['nombre','estado'];

    public function rolespermisos(){
	return $this->hasMany('App\Core\Entities\RolesPermisos');
    }
}
