@extends('layouts.dashboard')

@section('heading')
Pagoda Create
@endsection

@section('createButton')
<a href="{{ route('pagoda.index') }}" class="btn btn-success">Back</a>
@endsection

@section('content')

<div class="box box-default">
	<div class="box-header with-border">

		{!! Form::open(array('route' => 'pagoda.store','method' => 'post','enctype'=>"multipart/form-data")) !!}
		
		<div class="box-body">
		
		@include('admin.pagoda.form')
		
		</div>

		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		
		{!! Form::close() !!}
	</div>
</div>

@endsection