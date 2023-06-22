@extends('auth.layout')
@section('title', 'Registro')
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
                    <p class="mb-4">Por favor complete los campos para realizar el registro.</p>

                    <form id="formAuthentication" class="mb-3" action="{{ route('register.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="username" class="form-label">Nombre</label>
                          <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="Ingrese su nombre"
                            autofocus
                          />
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Correo Electrónico</label>
                          <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico" />
                        </div>
                        <div class="mb-3 form-password-toggle">
                          <label class="form-label" for="password">Contraseña</label>
                          <div class="input-group input-group-merge">
                            <input
                              type="password"
                              id="password"
                              class="form-control"
                              name="password"
                              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                              aria-describedby="password"
                            />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                          </div>
                        </div>
                        <button class="btn btn-primary d-grid w-100" type="submit">Registrarme</button>
                    </form>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>
@endsection