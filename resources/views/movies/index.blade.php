@extends('layout.app')

@section('content')
<section class="movieImg">
<div class="container mb-4">
	<div class="row align-items-center">
		<div class="col-md-8">
			<div class="title-page px-4 py-5 titleSection">
				<h3 class="display-6">Mis películas</h3>
			</div>
		</div>

		<div class="col-md-4 d-flex flex-row-reverse">
			<button type="button" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#modalMovie">
  				Añadir
			</button>
		</div>
	</div>

	<div class="modal fade" id="modalMovie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Añadir película</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>

	      <form method="Post" action="{{ route('movies.store') }}">
		      <div class="modal-body">
		        {{ csrf_field() }}

					<div class="form-group mb-3">
						<label>Película</label>
						<input type="text" name="nameMovie" placeholder="Título de la película" class="form-control">
					</div>

					<div class="form-group mb-3">
						<label>Director</label>
						<input type="text" name="director" placeholder="Nombre del director" class="form-control">
					</div>

					<div class="form-group mb-3">
						<label>Género</label>
						<select class="form-control form-select" name="genre">
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
						<label>Década de estreno</label>
						<select class="form-control form-select" name="year">
						  <option value="1910's">1910's</option>
						  <option value="1920's">1920's</option>
						  <option value="1930's">1930's</option>
						  <option value="1940's">1940's</option>
						  <option value="1950's">1950's</option>
						  <option value="1960's">1960's</option>
						  <option value="1970's">1970's</option>
						  <option value="1980's">1980's</option>
						  <option value="1990's">1990's</option>
						  <option value="2000's">2000's</option>
						  <option value="2010's">2010's</option>
						  <option value="2020's">2020's</option>
						</select>
					</div>

					<div class="form-group mb-3">
						<label>Actores</label>
						<textarea name="actors" class="form-control"></textarea>
					</div>

					<div class="form-group mb-3">
						<label>Calificación</label>
						<select class="form-control form-select" name="rate">
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
						<select class="form-control form-select" name="status">
						  <option value="No vista">No vista</option>
						  <option value="En progreso">En progreso</option>
						  <option value="Vista">Vista</option>
						</select>
					</div>

					<div class="form-group mb-3">
						<label>Sinopsis</label>
						<textarea name="synopsis" class="form-control"></textarea>
					</div>

		      </div>

		      <div class="modal-footer">
		        <button type="button" class="btn btnModal" data-bs-dismiss="modal">Cancelar</button>
		        <button type="submit" class="btn btnModal">Guardar</button>
		      </div>
		  </form>

	    </div>
	  </div>
	</div>


<div class="container">
	<div class="row">
		
		<div class="col-md-12">
			<div class="card card-section">
				<div class="card-body">
					<table class="table">
					  <tbody>
					  	@foreach($movies as $movie)
						    <tr class="nombreLinea">
						    	<th>{{ $movie->nameMovie }}</th>
						    </tr>
						    <tr>
						      <td>{{ $movie->director }}</td>
						      <td>{{ $movie->genre }}</td>
						      <td>{{ $movie->year }}</td>
						      <td>Calificación: {{ $movie->rate }}</td>
						      <td>
						      	@if($movie->status== 'No vista')
						      	<span class="badge bg-secondary">{{ $movie->status }}</span>
						      	@endif

						      	@if($movie->status== 'En progreso')
						      	<span class="badge bg-primary">{{ $movie->status }}</span>
						      	@endif

						      	@if($movie->status== 'Vista')
						      	<span class="badge bg-success">{{ $movie->status }}</span>
						      	@endif
						      </td>
						      
						      <td class="tdButtons">
						      	<a href="{{ route('movies.show', $movie->id) }}" class="row w-100 btn btnAcciones mb-1">Ver Detalle</a>

						      	<a href="javascript:void(0)" class="btn row w-100 mb-1 btnAcciones" data-bs-toggle="modal" data-bs-target="#editMovie_{{ $movie->id }}">
  									Editar
								</a>

								<form method="POST" class="row w-100" action="{{ route('movies.destroy', $movie->id) }}">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}

									<button type="submit" class="btn btnDelete">Borrar</button>
					
								</form>

						      </td>
						    </tr>

						    <div class="modal fade" id="editMovie_{{ $movie->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Editar Película</h5>
							        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							      </div>

							      <form method="Post" action="{{ route('movies.update', $movie->id) }}">
								      <div class="modal-body">
								        {{ csrf_field() }}
										{{ method_field('PUT') }}

										<div class="form-group mb-3">
											<label>Película</label>
											<input type="text" name="nameMovie" placeholder="Título de la película" class="form-control" value="{{ $movie->nameMovie }}">
										</div>

										<div class="form-group mb-3">
											<label>Director</label>
											<input type="text" name="director" placeholder="Nombre del director" class="form-control" value="{{ $movie->director }}">
										</div>
										
										<div class="form-group mb-3">
											<label>Género</label>
											<select class="form-control form-select" name="genre">
											  <option selected="{{ $movie->genre }}">{{ $movie->genre }}</option>
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
											<label>Década de estreno</label>
											<select class="form-control form-select" name="year">
											  <option selected="{{ $movie->year }}">{{ $movie->year }}</option>
											  <option value="1910's">1910's</option>
											  <option value="1920's">1920's</option>
											  <option value="1930's">1930's</option>
											  <option value="1940's">1940's</option>
											  <option value="1950's">1950's</option>
											  <option value="1960's">1960's</option>
											  <option value="1970's">1970's</option>
											  <option value="1980's">1980's</option>
											  <option value="1990's">1990's</option>
											  <option value="2000's">2000's</option>
											  <option value="2010's">2010's</option>
											  <option value="2020's">2020's</option>
											</select>
										</div>
										
										<div class="form-group mb-3">
											<label>Actores</label>
											<textarea name="actors" class="form-control"> {{ $movie->actors }} </textarea>
										</div>
										
										<div class="form-group mb-3">
											<label>Calificación</label>
											<select class="form-control form-select" name="rate">
											  <option selected="{{ $movie->rate }}">{{ $movie->rate }}</option>
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
											<select class="form-control form-select" name="status">
											  <option selected="{{ $movie->status }}">{{ $movie->status }}</option>
											  <option value="No vista">No vista</option>
											  <option value="En progreso">En progreso</option>
											  <option value="Vista">Vista</option>
											</select>
										</div>
										
										<div class="form-group mb-3">
											<label>Sinopsis</label>
											<textarea name="synopsis" class="form-control"> {{ $movie->synopsis }} </textarea>
										</div>
										
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btnModal" data-bs-dismiss="modal">Cancelar</button>
								        <button type="submit" class="btn btnModal">Guardar</button>
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

</div>


</section>
@endsection