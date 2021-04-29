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
                    <div class="container my-3">
                        {!! Form::open(['route' => 'farm.store']) !!}
                        <div class="form-group mb-3">
                            {!! Form::label('AdminName', 'Digite el nombre del Administrador', ['class' => 'form-label']) !!}
                            {!! Form::text('AdminName', null, ['class' => 'form-control']) !!}
                            @error('AdminName')
                                <span class="text-danger">Este campo es requerido</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('Name', 'Digite el nombre de la finca', ['class' => 'form-label']) !!}
                            {!! Form::text('Name', null, ['class' => 'form-control']) !!}
                            @error('Name')
                                <span class="text-danger">Este campo es requerido</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('Location', 'Digite la ubicación de la finca', ['class' => 'form-label']) !!}
                            {!! Form::text('Location', null, ['class' => 'form-control']) !!}
                            @error('Location')
                                <span class="text-danger">Este campo es requerido</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('Phone', 'Digite el teléfono de la finca', ['class' => 'form-label']) !!}
                            {!! Form::text('Phone', null, ['class' => 'form-control']) !!}
                            @error('Phone')
                                <span class="text-danger">Este campo es requerido</span>
                            @enderror
                        </div>

                        <div>
                            <a href="{{ route('farm.index') }}" class="btn btn-info">Volver</a>

                            {!! Form::submit('Registrar Finca', ['class' => 'btn btn-success', 'form-control']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
