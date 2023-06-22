@extends('auth.layout')
@section('title', 'Iniciar Sesión')
@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="{{ route('login.get') }}" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="" width="25">
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder">InnClod</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Bienvenido a InnClod! 👋</h4>
                        <p class="mb-4">Por favor ingrese sus credenciales para acceder al sistema.</p>

                        <form id="formAuthentication" class="mb-3" action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Correo Electrónico" autofocus />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Contraseña</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span id="togglePassword" class="input-group-text cursor-pointer"><i class="fas fa-eye" id="icon-password"></i></span>
                                </div>
                            </div>
                            {{-- <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me" />
                                <label class="form-check-label" for="remember-me"> Remember Me </label>
                            </div>
                        </div> --}}
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
@endsection
