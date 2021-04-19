@extends('layouts.plantilla')

@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('home') }}">Inicio <span
                                                class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item active">
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
                        @if ($count > 0)
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Nombre Administrador</th>
                                        <th scope="col">Ubicación</th>
                                        <th scope="col">Teléfono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($farms as $farm)
                                        <tr>
                                            <th scope="row">{{ $farm->id }}</th>
                                            <td>{{ $farm->Name }}</td>
                                            <td>
                                                @if ($farm->AdminName)
                                                    {{ $farm->AdminName }}
                                                @else
                                                    Sin Administrador
                                                @endif
                                            </td>
                                            <td>{{ $farm->Location }}</td>
                                            <td>{{ $farm->Phone }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-danger" role="alert">
                                Actualmente no posee registro de propiedades.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
