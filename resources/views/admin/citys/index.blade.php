@extends('admin.layout')

@section('header')
    @if( !checkrights('PSV', auth()->user()->permissions) )
        <script type="text/javascript">
            window.location="/admin/";
        </script>
    @endif

	<section class="content-header">
    <h1>CITYS<small>List of citys</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin') }}"><i class="fa fa-tachometer"></i> Home</a></li>
      <li class="active">Citys</li>
    </ol>
  </section>
@stop

@section('content')
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">List of citys</h3>
{{--      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModalState">--}}
{{--          <i class="fa fa-plus"></i> Create State--}}
{{--      </button>--}}
        @if( checkrights('PSE', auth()->user()->permissions) )
            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModalMunicipio" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i> Create citys
            </button>
        @endif
    </div>

    <!-- /.box-header -->
{{--    <div class="box-body">--}}
    <div class="box-body table-responsive7">
{{--        no-padding--}}
      <table id="post-table" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>States</th>
            <th>Date</th>
            <th>Option</th>
          </tr>
        </thead>

        <tbody>
          @php $i = 1; @endphp
          @foreach ($citys as $city)
            <tr>
              <td>{{ $i }}</td>
              <td>{!! $city->name !!}</td>
              <td>
                  @if ( $city->status == 1 ) <i class="fa fa-check"></i>
                  @else <i class="fa fa-close"></i> @endif
              </td>
              <td>
                  @foreach($city->state as $state )
                    {{ $state->name }}
                      @break
                  @endforeach
              </td>

              <td>{{ $city->created_at }}</td>
              <td>
                @if( checkrights('PSE', auth()->user()->permissions) )
                    <a href="{{ route('admin.citys.edit', $city) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                @endif

                @if( checkrights('PSD', auth()->user()->permissions) )
                    <form method="POST" action="{{ route('admin.citys.destroy', $city) }}" style="display: inline">
                      @csrf {{ method_field('DELETE') }}
                      <button class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this city?')">
                      <i class="fa fa-trash"></i>
                     </button>
                    </form>
               @endif
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
  @include('admin.citys.create')
@endpush

@push('script')
  <script>
    if ( window.location.hash === '#create-city' )
    { //alert(1);
      $('#myModalMunicipio').modal('show');
    }

    $('#myModalMunicipio').on('hide.bs.modal', function(){
      window.location.hash = '#';
    });

    $('#myModalMunicipio').on('shown.bs.modal', function(){
      $('#name').focus();
      window.location.hash = '#create-city';
    });
  </script>
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

