@extends('layouts.plantilla')

@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <h1 align="center" style="font-weight: bold; color: #ed502e " class="p-4">ACTIVACIÓN DE PERSONAS</h1>



                        <table class="table table-striped table-hover table-bordered border-primary">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">NOMBRE DEL USUARIO</th>
                                    <th scope="col">CORREO</th>
                                    <th colspan="2">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->estado=='0')
                                        <a href="" class="btn btn-success form-control">Activar</a>
                                        @else
                                        <a href="" class="btn btn-danger form-control">Desactivar</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
