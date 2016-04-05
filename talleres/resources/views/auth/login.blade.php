@include('template.partials.errors')

{!! Form::open(['route'=>'login','method'=>'POST']) !!}

	{!! Form::text('name',null,["required"=>"required","placeholder"=>"USUARIO:"]) !!}

{!! Form::password('password',null,["required"=>"required","placeholder"=>"Clave:"]) !!}


{!! Form::submit('LOGUEO') !!}

{!! Form::close() !!}