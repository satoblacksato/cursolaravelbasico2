<?php
 
namespace App\Core\Repositories;
use App\Http\Requests\RolesRequest;
use App\Core\Entities\Roles;
use DB;

class RolesRepository{

	public function forStore(RolesRequest $request)
    {
       DB::transaction(function() use($request){
        $objRoles=new Roles();
        $objRoles->nombre=$request->nombre;
        $objRoles->estado=$request->estado;
        $objRoles->save();
        $arrayRolPermiso=array();
    foreach ($request->permisos as $key => $value) {
           $arrayRolPermiso[]=
           array('rol_id'=>$objRoles->id,
                 'permiso_id'=>$value);
        }
        if(count($arrayRolPermiso)>0){
            DB::table('roles_permisos')->insert($arrayRolPermiso);
        }
       }); 
    }


public function forUpdate($request, $id)
    {
        DB::transaction(function() use($request,$id){
        $objRol=Roles::find($id);
        $objRol->nombre=$request->nombre;
        $objRol->estado=$request->estado;
        $objRol->save();
        });
    }
}