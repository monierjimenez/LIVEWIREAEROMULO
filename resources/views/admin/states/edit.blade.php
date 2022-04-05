@extends('admin.layout')

@section('header')
	<section class="content-header">
    <h1>STATES<small>Crear States</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin') }}"><i class="fa fa-tachometer-alt"></i> Home</a></li>
      <li><a href="{{ route('admin.states.index') }}"><i class="fa fa-list"></i>List states</a></li>
      <li class="active">Create</li>
    </ol>
  </section>
@stop

@section('content')
	<div class="row">
		<form method="POST" action="{{ route('admin.states.update', $state) }}" enctype="multipart/form-data">
			@csrf  {{ method_field('PUT') }}
		<div class="col-md-8">
			<div class="box box-primary">
		    	<div class="box-body">
		    		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		    			<label>Name</label>
		    			<input name='name' placeholder="Nombre de la state" class="form-control" value="{{ old('name', $state->name) }}">
		    			{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
		    		</div>

                    <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                        <label>Status</label>
                        <select name="status" class="form-control" >
                            <option value="0" {{ old('status', $state->status) == 0 ? 'selected' : ''}}>Draf</option>
                            <option value="1" {{ old('status', $state->status) == 1 ? 'selected' : ''}}>Public</option>
                        </select>
                        {!! $errors->first('status', '<span class="help-block">:message</span>') !!}
                    </div>
				</div>
	    	</div>
   		</div>


    	<div class="col-md-4">
    		<div class="box box-primary">
				<br>
				<div class="box-body">
			    	<div class="form-group">
			    		<button type="submit" class='btn btn-primary btn-block'>Save State</button>
			    	</div>
		    	</div>
    		</div>
    	</div>
    	</form>
	</div>
@stop

@push('styles')
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="/adminlte/plugins/iCheck/all.css">
@endpush

@push('script')
<!-- iCheck 1.0.1 -->
<script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
<script>
	//Flat red color scheme for iCheck
	$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
		checkboxClass: 'icheckbox_flat-green',
		radioClass: 'iradio_flat-green'
	});

</script>
@endpush
