<?php

namespace App\Core\Entities;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table="roles";

    protected $fillable=['nombre','estado'];

    public function rolespermisos(){
	return $this->hasMany('App\Core\Entities\RolesPermisos');
    }

    public function scopeSearch($query,$name){
    	return $query->where('nombre','LIKE',"%$name%");
    }
}

