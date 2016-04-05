
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
				@foreach($rolespermisos as $objRol)
					<tr>
						<td>{{ $objRol->id }}</td>
						<td>{{ $objRol->rol_id }}</td>
						<td>{{ $objRol->permiso_id }}</td>
						<td>
<a href="{{ route('admin.roles.edit',$objRol->id)}}">EDITAR</a>
<a href="{{ route('admin.roles.destroy',$objRol->id)}}">Eliminar</a>
<a href="{{ route('admin.roles.rolespermisos',$objRol->id)}}">Permisos</a>

						</td>
					</tr>
				@endforeach	
				</tbody>
			</table>