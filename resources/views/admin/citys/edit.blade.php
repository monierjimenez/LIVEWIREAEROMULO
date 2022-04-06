@extends('admin.layout')

@section('header')
    @if( !checkrights('PSE', auth()->user()->permissions) )
        <script type="text/javascript">
            window.location="/admin/";
        </script>
    @endif

	<section class="content-header">
    <h1>CITY<small>Create City</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin') }}"><i class="fa fa-tachometer-alt"></i> Home</a></li>
      <li><a href="{{ route('admin.citys.index') }}"><i class="fa fa-list"></i>List City</a></li>
      <li class="active">Create</li>
    </ol>
  </section>
@stop

@section('content')
	<div class="row">
		<form method="POST" action="{{ route('admin.citys.update', $city) }}" enctype="multipart/form-data">
			@csrf  {{ method_field('PUT') }}
		<div class="col-md-8">
			<div class="box box-primary">
		    	<div class="box-body">
		    		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		    			<label>Name</label>
		    			<input name='name' placeholder="Name the city" class="form-control" value="{{ old('name', $city->name) }}">
		    			{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
		    		</div>

                    <div class="form-group {{ $errors->has('state_id') ? 'has-error' : '' }}">
                        <label>States</label>
                        <select name="state_id" class="form-control" >
                            <option value="" >Selecciones States</option>
                            @foreach( $states as $state )
                                <option value="{{ $state->id }}" {{ old('state_id', $city->state_id) == $state->id ? 'selected' : ''}}>
                                    {{ $state->name }}
                                </option>
                            @endforeach
{{--                            <option value="0" {{ old('status', $municipio->estado_id) == 0 ? 'selected' : ''}}>Draf</option>--}}
{{--                            <option value="1" {{ old('status', $municipio->estado_id) == 1 ? 'selected' : ''}}>Public</option>--}}
                        </select>
                        {!! $errors->first('state_id', '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                        <label>Status</label>
                        <select name="status" class="form-control" >
                            <option value="0" {{ old('status', $city->status) == 0 ? 'selected' : ''}}>Draf</option>
                            <option value="1" {{ old('status', $city->status) == 1 ? 'selected' : ''}}>Public</option>
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
			    		<button type="submit" class='btn btn-primary btn-block'>Save City</button>
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
