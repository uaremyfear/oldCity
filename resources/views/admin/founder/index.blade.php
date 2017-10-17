@extends('layouts.dashboard')

@section('heading')
Founder
@endsection

@section('createButton')
<a class="btn btn-primary" href="{{ route('founder.create') }}">Create</a>
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
				@foreach ($founders as $founder)
				{{-- expr --}}

				<tr>
					<td>{{$founder->name}}</td>	
					<td>
						<div class="row">
							<div class="col-md-4">
								<a class="btn btn-primary" href="{{ route('founder.edit',$founder->id) }}">Edit</a>
							</div>
							<div class="col-md-8">
								<form action="{{ route('founder.destroy', $founder->id) }}" method="post">
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
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
	$(function () {
		$('#example2').DataTable({
			'paging'      : true,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : false
		})
	})
</script>
@endsection