<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$practica->id}}">
	{{Form::Open(array('action'=>array('catalogo\PracticaController@destroy',$practica->id),'method'=>'delete'))}}
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
			<input type="hidden" name="laboratorio" value="{{$horario->laboratorio->id}}">
				<h4 class="modal-title">Eliminar registro</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea eliminar el registro</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>