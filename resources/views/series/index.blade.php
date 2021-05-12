@extends('layout.app')

@section('content')

<div class="container-fluid mb-4">
	<div class="row align-items-center">
		<div class="col-md-8">
			<div class="title-page px-4 py-5">
				<h3 class="display-6">Mis Series</h3>
			</div>
		</div>

		<div class="col-md-4">
			<button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalSerie">
  				Añadir
			</button>
		</div>
	</div>
</div>

<div class="modal fade" id="modalSerie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir serie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="Post" action="{{ route('series.store') }}">
	      <div class="modal-body">
	        {{ csrf_field() }}

				<div class="form-group mb-3">
					<label>Serie</label>
					<input type="text" name="nameSerie" placeholder="Título de la serie" class="form-control">
				</div>

				<div class="form-group mb-3">
					<label>Temporadas</label>
					<input type="number" name="seasonSerie" placeholder="Número de temporadas" class="form-control" min="1" max="70">

				</div>

				<div class="form-group mb-3">
					<label>Plataforma</label>
					<select class="form-control form-select" name="platform">
					  <option value="Netflix">Netflix</option>
					  <option value="Prime Video">Prime Video</option>
					  <option value="HBO Max">HBO Max</option>
					  <option value="Star Premium">Star Premium</option>
					  <option value="Hulu">Hulu</option>
					  <option value="Blim">Blim</option>
					  <option value="Claro Video">Claro Video</option>
					  <option value="Mubi">Mubi</option>
					  <option value="Paramount Plus">Paramount Plus</option>
					  <option value="Apple Plus">Apple Plus</option>
					  <option value="Disney Plus">Disney Plus</option>
					  <option value="Crunchyroll">Crunchyroll</option>
					</select>
				</div>

				<div class="form-group mb-3">
					<label>Género</label>
					<select class="form-control form-select" name="genreSerie">
					  <option value="Acción">Acción</option>
					  <option value="Aventura">Aventura</option>
					  <option value="Comedia">Comedia</option>
					  <option value="Drama">Drama</option>
					  <option value="Terror">Terror</option>
					  <option value="Musical">Musical</option>
					  <option value="Infantil">Infantil</option>
					  <option value="Animación">Animación</option>
					  <option value="Romance">Romance</option>
					  <option value="Fantasía">Fantasía</option>
					  <option value="Suspenso">Suspenso</option>
					  <option value="Documental">Documental</option>
					</select>
				</div>

				<div class="form-group mb-3">
					<label>Actores</label>
					<textarea name="actorsSerie" class="form-control"></textarea>
				</div>


				<div class="form-group mb-3">
					<label>Calificación</label>
					<select class="form-control form-select" name="rateSerie">
					  <option value="10">10</option>
					  <option value="9">9</option>
					  <option value="8">8</option>
					  <option value="7">7</option>
					  <option value="6">6</option>
					  <option value="5">5</option>
					  <option value="4">4</option>
					  <option value="3">3</option>
					  <option value="2">2</option>
					  <option value="1">1</option>
					  <option value="0">0</option>
					</select>
				</div>

				
				<div class="form-group mb-3">
					<label>Estatus</label>
					<select class="form-control form-select" name="statusSerie">
					  <option value="No vista">No vista</option>
					  <option value="En progreso">En progreso</option>
					  <option value="Vista">Vista</option>
					</select>
				</div>
				

				<div class="form-group mb-3">
					<label>Sinopsis</label>
					<textarea name="synopsisSerie" class="form-control"></textarea>
				</div>

	      </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
	        <button type="submit" class="btn btn-primary">Guardar</button>
	      </div>
	  </form>

    </div>
  </div>
</div>


<div class="container">
	<div class="row">
		
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<table class="table">
					  <tbody>
					  	@foreach($series as $serie)
						    <tr class="nombreLinea2">
						    	<th>{{ $serie->nameSerie }}</th>
						    </tr>
						    <tr>
						      <td>Temporadas: {{ $serie->seasonSerie }}</td>
						      <td>{{ $serie->platform }}</td>
						      <td>{{ $serie->genreSerie }}</td>
						      <td>Calificación: {{ $serie->rateSerie }}</td>
						      <td>
						      	@if($serie->statusSerie== 'No vista')
						      	<span class="badge bg-secondary">{{ $serie->statusSerie }}</span>
						      	@endif

						      	@if($serie->statusSerie== 'En progreso')
						      	<span class="badge bg-primary">{{ $serie->statusSerie }}</span>
						      	@endif

						      	@if($serie->statusSerie== 'Vista')
						      	<span class="badge bg-success">{{ $serie->statusSerie }}</span>
						      	@endif
						      </td>
						      
						      <td>
						      	<a href="{{ route('series.show', $serie->id) }}">Ver Detalle</a>

						      	<a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editSerie_{{ $serie->id }}">
  									Editar
								</a>

								<form method="POST" action="{{ route('series.destroy', $serie->id) }}">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}

									<button type="submit" class="btn btn-dark">Borrar</button>
					
								</form>

						      </td>
						    </tr>

						    <div class="modal fade" id="editSerie_{{ $serie->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Editar Serie</h5>
							        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							      </div>

							      <form method="Post" action="{{ route('series.update', $serie->id) }}">
								      <div class="modal-body">
								        {{ csrf_field() }}
										{{ method_field('PUT') }}

										<label>Serie</label>
										<input type="text" name="nameSerie" placeholder="Título de la serie" value="{{ $serie->nameSerie }}">

										<br>
										<br>

										<label>Temporadas</label>
										<input type="number" name="seasonSerie" class="form-control" min="1" max="70" value="{{ $serie->seasonSerie }}">
										
										<br>
										<br>

										<label>Plataforma</label>
										<select class="form-control form-select" name="platform">
										  <option selected="{{ $serie->platform }}">{{ $serie->platform }}</option>
										  <option value="Netflix">Netflix</option>
										  <option value="Prime Video">Prime Video</option>
										  <option value="HBO Max">HBO Max</option>
										  <option value="Star Premium">Star Premium</option>
										  <option value="Hulu">Hulu</option>
										  <option value="Blim">Blim</option>
										  <option value="Claro Video">Claro Video</option>
										  <option value="Mubi">Mubi</option>
										  <option value="Paramount Plus">Paramount Plus</option>
										  <option value="Apple Plus">Apple Plus</option>
										  <option value="Disney Plus">Disney Plus</option>
										  <option value="Crunchyroll">Crunchyroll</option>
										</select>

										<br>
										<br>

										<label>Género</label>
										<select class="form-control form-select" name="genreSerie">
										  <option selected="{{ $serie->genreSerie }}">{{ $serie->genreSerie }}</option>
										  <option value="Acción">Acción</option>
										  <option value="Aventura">Aventura</option>
										  <option value="Comedia">Comedia</option>
										  <option value="Drama">Drama</option>
										  <option value="Terror">Terror</option>
										  <option value="Musical">Musical</option>
										  <option value="Infantil">Infantil</option>
										  <option value="Animación">Animación</option>
										  <option value="Romance">Romance</option>
										  <option value="Fantasía">Fantasía</option>
										  <option value="Suspenso">Suspenso</option>
										  <option value="Documental">Documental</option>
										</select>

										<br>
										<br>

										<label>Actores</label>
										<textarea name="actorsSerie"> {{ $serie->actorsSerie }} </textarea>

										<br>
										<br>

										<label>Calificación</label>
										<select class="form-control form-select" name="rateSerie">
										  <option selected="{{ $serie->rateSerie }}">{{ $serie->rateSerie }}</option>
										  <option value="10">10</option>
										  <option value="9">9</option>
										  <option value="8">8</option>
										  <option value="7">7</option>
										  <option value="6">6</option>
										  <option value="5">5</option>
										  <option value="4">4</option>
										  <option value="3">3</option>
										  <option value="2">2</option>
										  <option value="1">1</option>
										  <option value="0">0</option>
										</select>

										<br>
										<br>
										
										<label>Estatus</label>
										<select class="form-control form-select" name="statusSerie">
										  <option selected="{{ $serie->statusSerie }}">{{ $serie->statusSerie }}</option>
										  <option value="No vista">No vista</option>
										  <option value="En progreso">En progreso</option>
										  <option value="Vista">Vista</option>
										</select>

										<br>
										<br>
										
										<label>Sinopsis</label>
										<textarea name="synopsisSerie"> {{ $serie->synopsisSerie }} </textarea>

										<br>
										<br>

								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
								        <button type="submit" class="btn btn-primary">Guardar</button>
								      </div>
								 </form>
								 
							    </div>
							  </div>
							</div>
						@endforeach
					  </tbody>
					</table>
				</div>

			</div>

		</div>
	</div>
</div>
@endsection