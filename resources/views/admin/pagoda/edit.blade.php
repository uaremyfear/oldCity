@extends('layouts.dashboard')

@section('heading')
Pagoda Edit
@endsection

@section('createButton')
<a href="{{ route('pagoda.index') }}" class="btn btn-primary">Back</a>
@endsection


@section('content')

<div class="box box-default">
	<div class="box-header with-border">

		{!! Form::model($pagoda,['route' => ['pagoda.update',$pagoda->id],'method' => 'put','enctype'=>"multipart/form-data"]) !!}

		<div class="box-body">			
			@include('admin.pagoda.form')

			<div class="form-group col-md-6">
				{{ Form::label(null, 'Current Image') }} </br>
				<img src="{{ asset('/images/pagodas/thumbnails/'.$image) }}" alt="">			
			</div>

		</div>

		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
		
		{!! Form::close() !!}
	</div>
</div>
@endsection