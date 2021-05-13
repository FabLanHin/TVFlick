@extends('layout.app')

@section('content')
<section class="fondoLogIn">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5 cardLogIn">
                <div class="card-header">{{ __('Iniciar Sesión') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="row col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="row">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror logInInput" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror logInInput" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="w-100">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 my-2">
                            <div class="">
                                <button type="submit" class="btn btn-logIn">
                                    {{ __('Log In') }}
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
