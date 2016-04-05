@extends('template.master')

@section('masterTitle')
	Listado de Roles
@endsection
@section('masterHeader')
	Vista del Listado de Roles
@endsection
@section('masterFooter')
	Derechos Reservados
@endsection

@section('masterContent')

{!! Form::open(['route'=>'admin.roles.index','method'=>'GET']) !!}
	{!! Form::text('scope',null,['placeholder'=>'Buscar Nombre']) !!}
{!! Form::close() !!}

<a href="{{ route('admin.roles.create') }}">CREAR</a>
			<h3>
				ROLES DEL SISTEMA
			</h3>
			<table>
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							NOMBRE
						</th>
						<th>
							ESTADO
						</th>
						<th>
							ACCIONES
						</th>
					</tr>
				</thead>
				<tbody>	
				@foreach($objRoles as $objRol)
					<tr>
						<td>{{ $objRol->id }}</td>
						<td>{{ $objRol->nombre }}</td>
						<td>{{ $objRol->estado }}</td>
						<td>
<a href="{{ route('admin.roles.edit',$objRol->id)}}">EDITAR</a>
<a href="{{ route('admin.roles.destroy',$objRol->id)}}">Eliminar</a>
<a href="{{ route('admin.roles.rolespermisos',$objRol->id)}}">Permisos</a>

						</td>
					</tr>
				@endforeach	
				</tbody>
			</table>

				{!! $objRoles->render() !!}	
@endsection