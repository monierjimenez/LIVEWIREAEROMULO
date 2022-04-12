<!-- Modal name: myModalLabel-->
<div class="modal fade" id="myModalSpecs" tabindex="-1" role="dialog" aria-labelledby="myModalSpecs" aria-hidden="true">
  <form method="POST" action="{{ route('admin.specs.store', '#create-reference') }}">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalSpecs">Add new Specs</h4>
        </div>
        <div class="modal-body">

          <div class="box-body">
		    	<div class="form-group {{ $errors->has('reference') ? 'has-error' : '' }}">
		    		<input name='reference' id='reference' placeholder="New reference spec" class="form-control" value="{{ old('reference') }}">
		    		{!! $errors->first('reference', '<span class="help-block">:message</span>') !!}
		    	</div>
		  </div>
        </div>
        <div class="modal-footer">
            <input id="productspecs_id" name="productspecs_id" type="hidden" value="{{$product->id}}">
{{--          <button class="btn btn-default" data-dismiss="modal">Close</button>--}}
          <button class="btn btn-primary">Add Specs</button>
        </div>
      </div>
    </div>
  </form>
</div>
