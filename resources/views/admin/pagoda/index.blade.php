@extends('layouts.dashboard')

@section('heading')
Pagoda
@endsection

@section('createButton')
<a href="{{ route('pagoda.create') }}" class="btn btn-primary">Create</a>
@endsection

@section('content')
<div class="box">
	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th class="col-md-9">Name</th>
					<th class="col-md-3"></th>					
				</tr>
			</thead>
			<tbody>
				@foreach ($pagodas as $pagoda)
				<tr>
					<td>{{$pagoda->name}}</td>	
					<td>
						<div class="row">
							<div class="col-md-4">
								<a class="btn btn-primary" href="{{ route('pagoda.edit',$pagoda->id) }}">Edit</a>
							</div>
							<div class="col-md-8">
								<form action="{{ route('pagoda.destroy', $pagoda->id) }}" method="post">
									{{ csrf_field() }}
									{{ method_field('delete') }}
									<button class="btn btn-danger">Delete</button>
								</form>
							</div>
						</div>
					</td>				
				</tr>
				@endforeach                
			</tbody>
			<tfoot>
				<tr>
					<th>Name</th>					
				</tr>
			</tfoot>
		</table>
	</div>
</div>
@endsection

@section('script')
<!-- DataTables -->
<script src="{{ asset('/vendor/js/jquery.dataTables.min.js') }} "></script>
<script src="{{ asset('/vendor/js/dataTables.bootstrap.min.js') }}"></script>
<script>
	$(function () {
		$('#example1').DataTable({
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : false
		})
	})
</script>
@endsection