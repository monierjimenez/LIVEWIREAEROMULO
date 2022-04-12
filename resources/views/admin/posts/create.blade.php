<!-- Modal name: myModalLabel-->
<div class="modal fade" id="myModalPost" tabindex="-1" role="dialog" aria-labelledby="myModalProductLabel" aria-hidden="true">
  <form method="POST" action="{{ route('admin.posts.store', '#create-post') }}">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalProductLabel">Add new name post</h4>
        </div>
        <div class="modal-body">

          <div class="box-body">
		    	<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
		    		<input name='title' id='title' placeholder="New title post" class="form-control" value="{{ old('title') }}">
		    		{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
		    	</div>
		  </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-primary">Add Post</button>
        </div>
      </div>
    </div>
  </form>
</div>
