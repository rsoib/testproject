@extends('layout.main')

@if( (isset($weather)) && isset($date))
	
	<div class="container success" style="margin-top: 70px;">
		@if(isset($success))
			{{ $success }}
		@endif
		<div class="col-lg-12">
			<div class="card text-center">
  				<div class="card-header">
    				Cообщение 
  				</div>
  				<div class="card-body">
  					<p>Время в Москве: {{ $date }}</p>
    				<p>
    					Погода  в {{ $weather->name }}: 
    					<?php echo $weather->main->temp_min ?>°C
    				</p>
    				<p>Влажность: {{ $weather->main->humidity }} %</p>
    				<p>Ветер: {{ $weather->wind->speed }} км/ч</p>
    				<a href="{{ route('weather') }}" class="btn btn-primary">На главную</a>
  				</div>
  			
  				<div class="card-footer text-muted">
  				</div>
			</div>
		</div>
	</div>

	


@endif