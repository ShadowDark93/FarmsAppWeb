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
                              <a class="nav-link" href="{{ route('home') }}">Inicio <span class="sr-only">(current)</span></a>
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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
