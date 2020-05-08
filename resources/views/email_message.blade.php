<div class="container success" style="margin-top: 70px;">
		<div class="col-lg-12">
			<div class="card text-center">
				<h4>Здравствуйте {{ $name }}</h4>
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