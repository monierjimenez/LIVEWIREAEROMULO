@extends('admin.layout')

@section('header')
	<section class="content-header">
    <h1>MUNICIPALITIES<small>List of municipalitie</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin') }}"><i class="fa fa-tachometer"></i> Home</a></li>
      <li class="active">Municipalities</li>
    </ol>
  </section>
@stop

@section('content')
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">List of municipalities</h3>
{{--      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModalState">--}}
{{--          <i class="fa fa-plus"></i> Create State--}}
{{--      </button>--}}

        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModalMunicipio" data-backdrop="static" data-keyboard="false">
            <i class="fa fa-plus"></i> Create municipalitie
        </button>
    </div>

    <!-- /.box-header -->
    <div class="box-body">
      <table id="post-table" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>State</th>
            <th>Date</th>
            <th>Option</th>
          </tr>
        </thead>

        <tbody>
          @php $i = 1; @endphp
          @foreach ($municipios as $municipio)
            <tr>
              <td>{{ $i }}</td>
              <td>{!! $municipio->name !!}</td>
              <td>
                  @if ( $municipio->status == 1 ) <i class="fa fa-check"></i>
                  @else <i class="fa fa-close"></i> @endif
              </td>
              <td>
                  @foreach($municipio->estado as $estado )
                    {{ $estado->name }}
                      @break
                  @endforeach
              </td>

              <td>{{ $municipio->created_at }}</td>
              <td>
{{--                  {{$municipalitie}}--}}
                <a href="{{ route('admin.municipios.edit', $municipio) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                <form method="POST" action="{{ route('admin.municipios.destroy', $municipio) }}" style="display: inline">
                  @csrf {{ method_field('DELETE') }}
                  <button class="btn btn-xs btn-danger" onclick="return confirm('Estas seguro de eliminar este estado.')">
                  <i class="fa fa-trash"></i>
                 </button>
               </form>
              </td>
            </tr>
            @php $i = $i+1; @endphp
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
@stop

@push('modal')
  @include('admin.municipios.create')
@endpush

@push('script')
  <script>
    if ( window.location.hash === '#create-municipio' )
    { //alert(1);
      $('#myModalMunicipio').modal('show');
    }

    $('#myModalMunicipio').on('hide.bs.modal', function(){
      window.location.hash = '#';
    });

    $('#myModalMunicipio').on('shown.bs.modal', function(){
      $('#name').focus();
      window.location.hash = '#create-municipio';
    });
  </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="/adminlte/plugins/datatables/dataTables.bootstrap.css">
@endpush

@push('script')
  <!-- DataTables -->
  <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>

  <script>
  $(function () {
    $('#post-table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>


@endpush

