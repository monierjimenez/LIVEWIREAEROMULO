@extends('admin.layout')

@section('header')
	<section class="content-header">
		<h1>MOVIMIENTOS<small>Estadistica</small></h1>
		<ol class="breadcrumb">
		<li><a href="{{ route('admin') }}"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
		<li class="active"><i class="fa fa-user-plus"></i> Movimientos de los Equipos</li>
		</ol>
  	</section>
@stop

@section('content')
	<div class="row">	
		<div class="col-md-12">			
			<div class="box box-primary"><br>				
				<div class="col-md-12">					
					<div class="nav-tabs-custom">
						<table id="post-table" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Accion</th>            
									<th>Descipcion</th>
									<th>Dinero</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($repotestelefonos as $repotestelefono)
									<tr>
										<td>														
											{{ $repotestelefono->accion }}
										</td>              
										<td>{!! $repotestelefono->descripcion !!} </td>
										<td class="text-center">{{ $repotestelefono->pago }}</td>							
									</tr>	 					
							@endforeach
							</tbody>									
						</table>
					</div>          		
				</div>									
			</div>
		</div>
	</div>
</div>
@stop

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
			"autoWidth": false,
			"aaSorting": [],
			}); 
		});
	</script>
@endpush
