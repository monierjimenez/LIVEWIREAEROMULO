@extends('admin.layout')

@section('header')
    @if( !checkrights('PSV', auth()->user()->permissions) )
        <script type="text/javascript">
            window.location="/admin/";
        </script>
    @endif

	<section class="content-header">
    <h1>POSTS<small>List of posts</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Posts</li>
    </ol>
  </section>
@stop

@section('content')
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">List the Posts</h3>
{{--      <a href="{{ route('articuloallpdf') }}" class="btn btn-success pull-right" style="margin-left: 8px;" title="Exportar a PDF."><i class="fa fa-file-pdf-o"></i></a>--}}

        @if( checkrights('PSE', auth()->user()->permissions) )
            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModalPost" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i> Create Posts
            </button>
        @endif
    </div>

    <!-- /.box-header -->
      <div class="row">
          <div class="col-md-12">
              <div class="box box-primary"><br>
                  <div class="col-md-12">
                      <div class="box-body table-responsive7 no-padding">
                               <table id="post-table" class="table table-hover table-bordered">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Title</th>
                                      <th>State/City</th>
                                      <th>Name</th>
                                      <th>Price</th>
                                      <th>Status</th>
                                      <th>Date</th>
                                      <th>Acciones</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($posts as $post)
                                      <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            @if( $post->state_id != 0 )
                                                {{ $post->state->name }}
                                            @endif
                                             @if( $post->city_id != 0 )
                                                    / {{ $post->city->name }}
                                             @endif
                                        </td>
                                        <td>{{ $post->name }}</td>
                                        <td class="text-center">{{ $post->price }}</td>
                                        <td>
                                            @if( $post->status == 0 )
                                                <i class="fa fa-close"></i>
                                            @else
                                                <i class="fa fa-check"></i>
                                            @endif
                                        </td>
                                          <td>
                                              {{ $post->created_at->diffForHumans() }}
                                          </td>
                                        <td>
                                          @if( checkrights('PSV', auth()->user()->permissions) )
                                              <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                          @endif

                                          @if( checkrights('PSV', auth()->user()->permissions) )
                                              <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" style="display: inline">
                                                  @csrf {{ method_field('DELETE') }}
                                                  <button class="btn btn-xs btn-danger" onclick="return confirm('Estas seguro de eliminar este articulo.')">
                                                  <i class="fa fa-trash"></i>
                                                  </button>
                                             </form>
                                          @endif
                          {{--               <a href="{{ route('articulopdf', $product) }}" class="btn btn-success btn-xs" title="Exportar a PDF."><i class="fa fa-file-pdf-o"></i></a>--}}
              </td>
            </tr>
          @endforeach
        </tbody>
        </table>
    </div>
                  </div>
              </div>
          </div>
      </div>
    <!-- /.box-body -->
  </div>
@stop

@push('modal')
  @include('admin.posts.create')
@endpush

@push('styles')
    <link rel="stylesheet" href="/adminlte/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="/adminlte/css/responsiveAdmin.css">
@endpush

@push('script')
  <!-- DataTables -->
  <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>

  <script>
    $(function () {
    /* $("#example1").DataTable();*/

      $('#post-table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "aaSorting": [],

      });
    });
        if( window.location.hash === '#create-post' )
        {
            $('#myModalPost').modal('show');
        }

        $('#myModalPost').on('hide.bs.modal', function(){
            window.location.hash = '#';
        });

        $('#myModalPost').on('shown.bs.modal', function(){
            $('#title').focus();
            window.location.hash = '#create-post';
        });

  </script>
@endpush

























{{--public $ nombre;--}}
{{--public $ email;--}}
{{--cuerpo $ publico;--}}
{{--función pública enviar ()--}}
{{--{--}}
{{--    $ validatedData = $ this-> validate ([--}}
{{--        'nombre' => 'requerido | min: 6',--}}
{{--        'email' => 'required | email',--}}
{{--        'cuerpo' => 'requerido',--}}
{{--    ]);--}}

{{--    Contacto :: crear ($ validatedData);--}}
{{--    return redirect () -> to ('/ form');--}}

{{--    }--}}
{{--    función pública render ()--}}
{{--    {--}}
{{--    vista de retorno ('livewire.contact-form');--}}
{{--    }--}}
{{--}--}}
