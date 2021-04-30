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
                                    <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('farm.index') }}">Granjas</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('inventario.index') }}">Inventario<span
                                            class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="container my-3">
                    {!! Form::open(['route' => 'inventario.store']) !!}

                    <div class="form-group mb-3">
                        {!! Form::hidden('users_id', Auth()->user()->id, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('farms_id', 'Seleccione la finca', ['class' => 'form-label']) !!}
                        {!! Form::select('farms_id', $farms->pluck('Name', 'id'), null, ['class' => 'form-control']) !!}
                        @error('farms_id')
                            <span class="text-danger">Este campo es requerido</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('InternalCode', 'Digite el código interno del animal', ['class' => 'form-label']) !!}
                        {!! Form::text('InternalCode', null, ['class' => 'form-control', 'placeholder' => 'Código Interno']) !!}
                        @error('InternalCode')
                            <span class="text-danger">Este campo es requerido</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('Category', 'Digite la especie del animal', ['class' => 'form-label']) !!}
                        {!! Form::text('Category', null, ['class' => 'form-control', 'placeholder' => 'Especie']) !!}
                        @error('Category')
                            <span class="text-danger">Este campo es requerido</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('Sex', 'Digite el sexo del animal', ['class' => 'form-label']) !!}
                        {!! Form::select('Sex', ['M' => 'Masculino', 'F' => 'Femenino'], 1, ['class' => 'form-control']) !!}
                        @error('Sex')
                            <span class="text-danger">Este campo es requerido</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('ThirdLabel', 'El animal esta tercerizado?', ['class' => 'form-label']) !!}
                        {!! Form::select('Third', ['0' => 'No', '1' => 'Si'], 0, ['class' => 'form-control']) !!}
                        @error('Third')
                            <span class="text-danger">Este campo es requerido</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('ThirdName', 'Digite el nombre del tercero', ['class' => 'form-label']) !!}
                        {!! Form::text('ThirdName', null, ['class' => 'form-control', 'placeholder' => 'Nombre del tercero']) !!}
                        @error('ThirdName')
                            <span class="text-danger">Este campo es requerido</span>
                        @enderror
                    </div>

                    <div>
                        <a href="{{ route('inventario.index') }}" class="btn btn-info">Volver</a>

                        {!! Form::submit('Registrar Elemento', ['class' => 'btn btn-success', 'form-control']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
