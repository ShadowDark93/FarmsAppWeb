@extends('layouts.plantilla')

<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

</style>

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
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('inventario.index') }}">Inventario<span
                                            class="sr-only"></span></a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('inventario.index') }}">Peso<span
                                            class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="container my-3">
                    {!! Form::open(['route' => 'peso.store']) !!}

                    <div class="form-group mb-3">
                        {!! Form::hidden('inventories_id', $id, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('NombrePesador', 'Digite el nombre del pesador', ['class' => 'form-label']) !!}
                        {!! Form::text('NombrePesador', null, ['class' => 'form-control', 'placeholder' => 'Digite el nombre del pesador']) !!}
                        @error('NombrePesador')
                            <span class="text-danger">Este campo es requerido</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('valor', 'Digite el valor comercial del animal', ['class' => 'form-label']) !!}
                        {!! Form::number('valor', null, ['class' => 'form-control', 'placeholder' => 'Digite el valor comercial del animal']) !!}
                        @error('valor')
                            <span class="text-danger">Este campo es requerido</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('peso', 'Digite el peso del animal en Kilogramos', ['class' => 'form-label']) !!}
                        {!! Form::number('peso', null, ['class' => 'form-control', 'step="any"', 'placeholder' => 'Digite el peso en KG']) !!}
                        @error('peso')
                            <span class="text-danger">Este campo es requerido</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('fechaPeso', 'Digite el peso del animal en Kilogramos', ['class' => 'form-label']) !!}
                        {!! Form::date('fechaPeso', null, ['class' => 'form-control', 'step="any"', 'placeholder' => 'Digite el peso en KG']) !!}
                        @error('fechaPeso')
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

@section('js')



@endsection
