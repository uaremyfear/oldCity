<!DOCTYPE html>
<html>
<head>
	<title>Bagan</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('kyaw/bootstrap-4.0.0-beta/dist/css/bootstrap.min.css ') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('kyaw/style.css') }} ">

</head>
<body>
	<!-- Banner -->
	<div class="banner">
		<div class="banner-text">
			<p class="text-center">	THE BAGAN GUIDE</p>						
		</div>													
	</div>
<!-- Body -->
	<div class="body-text">
		<div class="container">
			<div class="row">
				
				@foreach($pagodas as $pagoda)
				<div class="col-4">
					<div class="col-3">
						<img src="{{ asset('images/pagodas/'.$pagoda->image()->first()->image_name.'.'.$pagoda->image()->first()->image_extension) }}" style="width:300px;height:auto;">						
					</div>	
					<div class="col-9">
						<h3>{{ $pagoda->name }}</h3>
						<p>{{ $pagoda->description }}</p>						
					</div>				
				</div>				
				@endforeach
									
			</div>
			
		</div>
		
	</div>
		
	<!-- footer -->	

	<div class="footer">
		<p>Copyright 2018-2019</p>		
	</div>	
</body>
</html>