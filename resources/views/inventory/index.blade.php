@extends('layouts.plantilla')

@section('contenido')

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
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('farm.index') }}">Granjas</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ route('inventario.index') }}">Inventario</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <div class="card-body">
                        @if ($data->count() > 0)
                            <table class="table table-striped table-hover table-bordered table-responsive{-sm|-md|-lg|-xl|-xxl">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Codigo Interno</th>
                                        <th scope="col">Ubicación</th>
                                        <th scope="col">Categoría</th>
                                        <th scope="col">Sexo</th>
                                        <th scope="col">Tercerizado</th>
                                        <th scope="col">Nombre Tercero</th>
                                        <th scope="col">Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <th scope="row">{{ $d->id }}</th>
                                            <td>{{ $d->InternalCode }}</td>
                                            <td>{{ $d->farm->Name }}</td>
                                            <td>{{ $d->Category }}</td>
                                            <td>{{ $d->Sex }}</td>
                                            <td>
                                                @if ($d->third==1)
                                                    Sí
                                                @else
                                                    No
                                                @endif
                                            </td>
                                            <td>
                                                @if ($d->third==1)
                                                    {{ $d->ThirdName }}
                                                @else
                                                    No aplica.
                                                @endif
                                            </td>
                                            <td></td>
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

@endsection
