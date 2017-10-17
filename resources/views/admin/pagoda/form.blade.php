			<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
				{{ Form::label('name', 'Name') }}
				{{ Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'Enter Name' ]) }}
				@if ($errors->has('name'))
				<span class="help-block">
					{{ $errors->first('name') }}
				</span>
				@endif				
			</div>
			<div class="row">
				<div class="form-group {{ $errors->has('lat') ? ' has-error' : '' }} col-md-6">
					{{ Form::label('lat', 'Lattitute') }}
					{{ Form::text('lat',null, ['class' => 'form-control', 'placeholder' => 'Enter Lattitute' ]) }}
					@if ($errors->has('lat'))
					<span class="help-block">
						{{ $errors->first('lat') }}
					</span>
					@endif				
				</div>

				<div class="form-group {{ $errors->has('lng') ? ' has-error' : '' }} col-md-6">
					{{ Form::label('lng', 'Longitude') }}
					{{ Form::text('lng',null, ['class' => 'form-control', 'placeholder' => 'Enter Longitude' ]) }}
					@if ($errors->has('lng'))
					<span class="help-block">
						{{ $errors->first('lng') }}
					</span>
					@endif				
				</div>
			</div>
			<div class="row">
				<div class="form-group {{ $errors->has('founder_id') ? ' has-error' : '' }} col-md-6">
					{{ Form::label('founder_id', 'Founder') }}					
					{{ Form::select('founder_id', $founders, null, ['class'=>'form-control','placeholder' => 'Choose Founder Name...']) }}
					@if ($errors->has('founder_id'))
					<span class="help-block">
						{{ $errors->first('founder_id') }}
					</span>
					@endif				
				</div>

				<div class="form-group {{ $errors->has('built_in') ? ' has-error' : '' }} col-md-6">
					{{ Form::label('built_in', 'Built In') }}
					{{ Form::text('built_in',null, ['class' => 'form-control', 'placeholder' => 'Enter Built In Year' ]) }}
					@if ($errors->has('built_in'))
					<span class="help-block">
						{{ $errors->first('built_in') }}
					</span>
					@endif				
				</div>
			</div>

			<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
				{{ Form::label('description', 'Description') }}
				{{ Form::textarea('description',null, ['class' => 'form-control', 'placeholder' => 'Enter Description' ]) }}
				@if ($errors->has('description'))
				<span class="help-block">
					{{ $errors->first('description') }}
				</span>
				@endif				
			</div>

			<div class="form-group {{ $errors->has('image') ? ' has-error' : '' }} col-md-6">
				{{ Form::label('image', 'Image') }}
				{{ Form::file('image',null,['class'=>'form-control']) }}
				@if ($errors->has('image'))
				<span class="help-block">
					{{ $errors->first('image') }}
				</span>
				@endif				
			</div>