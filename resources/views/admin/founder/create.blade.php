@extends('layouts.dashboard')

@section('heading')
Founder
@endsection

@section('content')

<div class="box box-default">
	<div class="box-header with-border">

		{!! Form::open(array('route' => 'founder.store','method' => 'post')) !!}

		<div class="box-body">
			<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
				{{ Form::label('name', 'Name') }}
				{{ Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'Enter Name' ]) }}
				@if ($errors->has('name'))
				<span class="help-block">
					{{ $errors->first('name') }}
				</span>
				@endif				
			</div>
		</div>
		
		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		
		{!! Form::close() !!}
	</div>
</div>
@endsection