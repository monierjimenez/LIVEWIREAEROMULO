@extends('admin.layout')

@section('header')
	<section class="content-header">
    <h1>POST <small>Create Post</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Post</a></li>
      <li class="active">{{ $post->title }}</li>
    </ol>
  </section>
@stop

@section('content')
	<div class="row">
		@if($post->photo->count())
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class='row'>
                            @foreach ($post->photo as $photo)
                                 <form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
                                     @csrf {{ method_field('DELETE') }}
                                     <div class="col-md-1" >
                                         <button class="btn btn-danger btn-xs" style='position:absolute '><i class="fa fa-remove"></i></button>
                                         <img class='img-responsive' src="/images/{{ $photo->url }}" alt="">
                                     </div>
                                 </form>
                             @endforeach
                        </div>
                    </div>
                </div>
            </div>
		@endif

		<div class="col-md-7">
            <div class="box box-primary">
                <form method="POST" action="{{ route('admin.posts.update', $post) }}">
                    @csrf  {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6 {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <label>Title</label>
                                    <input name='title' placeholder="Title post" class="form-control" value="{{ old('title', $post->title) }}">
                                    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                                </div>
                                <div class="col-xs-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label>Name</label>
                                    <input name='name' placeholder="Name" class="form-control" value="{{ old('name', $post->name) }}">
                                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6 {{ $errors->has('state_id') ? 'has-error' : '' }}">
                                    <label>State Post</label>
                                    <select name="state_id" class="form-control select2">
                                        <option value="">Select State</option>
                                        @foreach( $states as $state )
                                            <option value="{{ $state->id }}"
                                                {{ old('state_id', $state->categorie_id) == $state->id ? 'selected' : '' }}>
                                                {{ $state->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('state_id', '<span class="help-block">:message</span>') !!}
                                </div>
                                <div class="col-xs-6 {{ $errors->has('city_id') ? 'has-error' : '' }}">
                                    <label>City Post</label>
                                    <select name="state_id" class="form-control select2">
                                        <option value="">Select City</option>
                                        @foreach( $citys as $city )
                                            <option value="{{ $city->id }}"
                                                {{ old('city_id', $city->categorie_id) == $city->id ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('city_id', '<span class="help-block">:message</span>') !!}
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4 {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label>E-mail</label>
                                    <input name='email' placeholder="E-mail" class="form-control" value="{{ old('email', $post->email) }}">
                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                </div>
                                <div class="col-xs-4 {{ $errors->has('phone') ? 'has-error' : '' }}">
                                    <label>Phone</label>
                                    <input name='phone' placeholder="Phone" class="form-control" value="{{ old('phone', $post->phone) }}">
                                    {!! $errors->first('phone', '<span class="help-block">:message</span>') !!}
                                </div>
                                <div class="col-xs-4 {{ $errors->has('price') ? 'has-error' : '' }}">
                                    <label>Price</label>
                                    <input name='price' placeholder="Sale price" class="form-control" value="{{ old('price', $post->price) }}">
                                    {!! $errors->first('price', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('seotitle') ? 'has-error' : '' }}">
                            <label>SEO Title</label>
                            <input name='seotitle' placeholder="SEO Title" class="form-control" value="{{ old('seotitle', $post->seotitle) }}">
                            {!! $errors->first('seotitle', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('seodescription') ? 'has-error' : '' }}">
                            <label>SEO Description</label>
                            <input name='seodescription' placeholder="SEO Description" class="form-control" value="{{ old('seodescription', $post->seodescription) }}">
                            {!! $errors->first('seodescription', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('seokeywords') ? 'has-error' : '' }}">
                            <label>SEO Keywords</label>
                            <input name='seokeywords' placeholder="SEO Keywords Ej: envios, cuba" class="form-control" value="{{ old('seokeywords', $post->seokeywords) }}">
                            {!! $errors->first('seokeywords', '<span class="help-block">:message</span>') !!}
                        </div>


                        <div class="form-group">
                            <button type="submit" class='btn btn-primary btn-block'>Save Post</button>
                        </div>
				    </div>
            </div>
        </div>

    	<div class="col-md-5">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <label>Description post</label>
                        <textarea name='description' id='description' rows="4" class="form-control" placeholder="Description post">
			    			{{ old('description', $post->description) }}
			    		</textarea>
                        {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        Imagen (550x750)
                        <div class="dropzone"></div>
                    </div>
			    </div>
            </div>
    	</div>
        </form>
	</div>
@stop



@push('modal')

@endpush

@push('styles')
	<!-- Select2 -->
	<link rel="stylesheet" href="/adminlte/plugins/select2/select2.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="/adminlte/plugins/iCheck/all.css">

{{--	<link rel="stylesheet" href="/adminlte/plugins/datatables/dataTables.bootstrap.css">--}}
@endpush

@push('script')
	<!-- Select2 -->
	<script src="/adminlte/plugins/select2/select2.full.min.js"></script>

	<!-- iCheck 1.0.1 -->
	<script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.css" integrity="sha512-bbUR1MeyQAnEuvdmss7V2LclMzO+R9BzRntEE57WIKInFVQjvX7l7QZSxjNDt8bg41Ww05oHSh0ycKFijqD7dA==" crossorigin="anonymous" />
	<!-- CK Editor -->
	<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

	<!-- DataTables -->
{{--	<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>--}}
{{--	<script src="/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>--}}

	<script type="text/javascript">
		$(".select2").select2({
			tags: false
		});
		CKEDITOR.replace('description');

        var myDropzone1 = new Dropzone('.dropzone', {
            url: '/admin/posts/{{ $post->id }}/photos',
            paramName: 'photo',
            acceptedFiles: 'image/*',
            maxFilesize: 2,
            maxFiles: 5,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            dictDefaultMessage: 'Drag the photo here to upload them'
        });

        myDropzone1.on('error', function (file, res) {
            var msg = res.errors.photo[0];
            $('.dz-error-message > span').text(msg);
        });
        Dropzone.autoDiscover = false;

		//Flat red color scheme for iCheck
		$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
			checkboxClass: 'icheckbox_flat-green',
			radioClass: 'iradio_flat-green'
		});
    </script>
@endpush
