<!-- Modal name: myModalLabel-->
<div class="modal fade" id="myModalArticuloTipoP" tabindex="-1" role="dialog" aria-labelledby="myModalArticuloTipoP">
  <form method="GET" action="{{ route('admin.articulos.createTipoProducto') }}">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalArticuloTipoP">Agrege "Tipo de Articulo" para la Categoria</h4>
        </div>
        <div class="modal-body">
          
          <div class="box-body">
		    		<div class="form-group {{ $errors->has('tipo_producto') ? 'has-error' : '' }}">
		    			<input name='tipo_producto' id='tipo_producto' placeholder="Tipo producto" class="form-control" value="{{ old('tipo_producto') }}">
		    			{!! $errors->first('tipo_producto', '<span class="help-block">:message</span>') !!}
		    		</div>
		    	</div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-primary">Crear Tipo de Producto</button>
        </div>
      </div>
    </div>
  </form>  
</div>