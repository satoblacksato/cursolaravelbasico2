@include('template.partials.errors')

{!! Form::open(['route'=>['admin.roles.update',$objRol],'method'=>'PUT']) !!}

	{!! Form::label('nombre','Nombre: ') !!}
	{!! Form::text('nombre',$objRol->nombre,["required"=>"required"])!!}

	{!! Form::label('estado','Estado:') !!}
	{!! Form::select('estado',['activo'=>'Activo','inactivo'=>'inactivo'],$objRol->estado) !!}

	{!! Form::submit('Actualizar') !!}
{!! Form::close() !!}










