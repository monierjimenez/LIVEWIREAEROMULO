<!-- Modal -->
<div class="modal fade" id="myModalState" tabindex="-1" role="dialog" aria-labelledby="myModalStates">
  <form method="POST" action="{{ route('admin.states.store', '#create-state') }}">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalStates">Nombre de la State</h4>
        </div>
        <div class="modal-body">

          <div class="box-body">
		    		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		    			<input name='name' id='name' placeholder="Name the state" class="form-control" required value="{{ old('name') }}">
		    			{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
		    		</div>
		    	</div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-primary">Crear State</button>
        </div>
      </div>
    </div>
  </form>
</div>
