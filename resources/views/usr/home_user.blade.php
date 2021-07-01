@extends('layouts.plantilla')

@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (Auth()->user()->estado == 1)
                        <div class="card-header">
                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ route('home') }}">Inicio <span
                                                    class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('farm.index') }}">Granjas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('inventario.index') }}">Inventario</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <div class="card-body">
                            <div class="cotainer">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="card text-center">
                                            <div class="card-header alert-dark">
                                                Propiedades
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">
                                                    Actualmente posee {{ $propiedades }} propiedades.
                                                </p>
                                                <a href="{{ route('farm.index') }}" class="btn btn-primary">Ir a las
                                                    propiedades.</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="card text-center ">
                                            <div class="card-header alert-dark">
                                                Inventario
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">
                                                    Actualmente posee {{ $inventario }} animales.
                                                </p>
                                                <a href="{{ route('inventario.index') }}" class="btn btn-primary">Ir al
                                                    inventario</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning" role="alert">
                            Estamos procesando su solicitud para poder ingresar su informacion.
                            Por favor sea paciente!.
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
