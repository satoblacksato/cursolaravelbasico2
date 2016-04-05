@include('template.partials.errors')

{!! Form::open(['route'=>'admin.roles.store','method'=>'POST']) !!}

	{!! Form::label('nombre','Nombre: ') !!}
	{!! Form::text('nombre',null,["required"=>"required"])!!}

	{!! Form::label('estado','Estado:') !!}
	{!! Form::select('estado',['activo'=>'Activo','inactivo'=>'inactivo']) !!}


{!! Form::label('permisos','Permisos:') !!}
	{!! Form::select('permisos[]',$permisos,null,['multiple'=>'true']) !!}


	{!! Form::submit('Grabar') !!}
{!! Form::close() !!}