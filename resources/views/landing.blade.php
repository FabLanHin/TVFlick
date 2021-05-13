@extends('layout.app')

@section('content')
<section class="container-image">
<div class="px-4 pt-5 text-center body-landing">
  <h1 class="display-4 fw-bold app-landing textLanding">TVFlick</h1>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4 text-landing textLanding">¡Bienvenido/a! La mejor app para organizar y calificar tus series y películas.</p>

    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
      <a href="{{ route('register') }}" class="btn btn-registro px-4 me-sm-3 ">¡Inicia Ahora!</a>
    </div>
  </div>
  <div class="overflow-hidden" style="max-height: 100vh;">
    <div class="container px-5">
      <img src="{{ asset('img/landing.jpg') }}" class="img-fluid rounded-3 shadow-lg mb-4" alt="Example image " width="700" height="500" loading="lazy">
    </div>
  </div>
</div>


@endsection