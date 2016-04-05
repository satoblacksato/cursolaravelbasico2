<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Core\Entities\Roles;
use App\Core\Entities\Permisos;
use App\Core\Entities\RolesPermisos;
use App\Http\Requests\RolesRequest;
use DB;
use App\Core\Repositories\RolesRepository;
use Illuminate\Routing\Route;

class RolesController extends Controller
{
    protected $objRPY;
    protected $path='roles.';
    public function __construct(RolesRepository $objRPY){
    $this->beforeFilter('@find',['only'=>['edit','destroy']]);
        $this->objRPY=$objRPY;
    }

    public function find(Route $route){
     $this->objRoles=Roles::find($route->getParameter('roles'));
       $this->notFound($this->objRoles);
    }



    public function index(Request $request)
    {
       //$objRoles=Roles::paginate(5); 
$request->scope= $request->scope==NULL?'':$request->scope;
$objRoles=Roles::search($request->scope)->orderBy('nombre','ASC')->paginate(5);

return view($this->path.'index')->with([   'objRoles' => $objRoles
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos=Permisos::orderBy('id','desc')
       ->lists('nombre','id');
       // ->select('id','nombre');  //extraer ciertos camps


 return view($this->path.'create',compact('permisos',$permisos));
    }

   
    public function store(RolesRequest $request)
    {
       $this->objRPY->forStore($request); 
       return redirect()->route($this->path.'index');
    }


    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
 return view($this->path.'edit')->with(['objRol'=>$this->objRoles]);
    }

   
    public function update(Request $request, $id)
    {
        $this->objRPY->forUpdate($request, $id);
        return redirect()->route($this->path.'index');
    }

    
    public function destroy($id)
    {
    DB::transaction(function() use($id){
        $objRol=Roles::find($id);
        $objRol->delete();
        });
     return redirect()->route($this->path.'index');
    }

    public function rolespermisos($roles){
        $objRol=Roles::find($roles);
$id=$objRol->id;
    $rs=DB::table('roles_permisos as rp')
    ->join('permisos as r', function($join) use($id){
        $join->on('rp.permiso_id','=','r.id')
        -> where('rp.rol_id','=',$id);

         //-> whereIn('rp.rol_id',$objRol->id)
    })->orderBy('r.nombre','ASC')
    ->select('r.nombre','r.id')
    ->get();       

    $rs=RolesPermisos::join('permisos','permiso_id','=','permisos.id')
    ->where('rol_id','=',$objRol->id)
    ->select('permisos.id','permisos.nombre')->get();



        $arrayPermisos=$objRol->rolespermisos();
        return view($this->path.'rolespermisos')->with(['rolespermisos'=>$arrayPermisos]);
    }
}












