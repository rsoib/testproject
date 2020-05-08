@extends('layout.main')
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column"> 
  	<main role="main" class="inner cover">
  		@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    	@endif
      		<button type="button" class="btn btn-lg btn-primary start" data-toggle="modal" data-target="#exampleModal">
 				Старт
			</button>
  	</main>
	
	
<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Введите данные</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      			</div>
      		
      			<div class="modal-body">

        			<form action="weather/send" method="post">
  						<div class="row">
    						<div class="col">
      							<input type="name" name="name" class="form-control" placeholder="Имя" value="{{ old('name') }}" required>
    						</div>
    						<div class="col">
      							<input type="email" name="email" class="form-control" placeholder="Почта" value="{{ old('name') }}" required>
    						</div>
  						</div>

  						<input type="submit" class="btn btn-secondary add" value="Узнать погоду">
					</form>
      			</div>
    		</div>
  		</div>
	</div>
  	<footer class="mastfoot mt-auto">
    	<div class="inner">
      		<p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
    	</div>
  	</footer>
</div>




