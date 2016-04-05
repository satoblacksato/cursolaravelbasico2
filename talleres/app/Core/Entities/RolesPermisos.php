<?php

namespace App\Core\Entities;

use Illuminate\Database\Eloquent\Model;

class RolesPermisos extends Model
{
    protected $table="roles_permisos";
    protected $fillable=['rol_id','permiso_id'];

    public function roles(){
    	return $this->belongsTo('App\Core\Entities\Roles');
    }

    public function permisos(){
    	return $this->belongsTo('App\Core\Entities\Permisos');
    }
}
