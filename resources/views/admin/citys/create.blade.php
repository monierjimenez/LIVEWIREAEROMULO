<!-- Modal -->
<div class="modal fade" id="myModalMunicipio" tabindex="-1" role="dialog" aria-labelledby="myModalStates">
  <form method="POST" action="{{ route('admin.citys.store', '#create-city') }}">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalStates">Name the City</h4>
        </div>
        <div class="modal-body">

          <div class="box-body">
		    		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		    			<input name='name' id='name' placeholder="Name the City" class="form-control" required value="{{ old('name') }}">
		    			{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
		    		</div>
		    	</div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-primary">Create City</button>
        </div>
      </div>
    </div>
  </form>
</div>
