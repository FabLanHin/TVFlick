@extends('layout.app')

@section('content')
<section class="fondoLogIn">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5 cardLogIn">
                <div class="card-header">{{ __('Registrarse') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="row col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="row">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror logInInput" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row my-4">
                            <label for="email" class="row col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="row">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror logInInput" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row my-4">
                            <label for="password" class="row col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="row">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror logInInput" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row my-4">
                            <label for="password-confirm" class="row col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="row">
                                <input id="password-confirm" type="password" class="form-control logInInput" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0 my-2">
                            <div class="">
                                <button type="submit" class="btn btn-logIn">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
