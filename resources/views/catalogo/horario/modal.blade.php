<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$horario->id}}-{{$id_lab}}">
	{{Form::Open(array('action'=>array('catalogo\HorarioControler@destroy',$horario->id),'method'=>'delete'))}}
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
			
				<h4 class="modal-title">Eliminar registro</h4>
			</div>
			<input type="hidden" name="idl" value="{{$id_lab}}">

			<div class="modal-body">
				<p>Confirme sí desea Eliminar el registro</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>