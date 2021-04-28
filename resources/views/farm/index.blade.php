@extends('layouts.plantilla')

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">

@endsection

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
                            <table class="table table-condensed table-bordered table-striped" id="personas">
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

@section('js')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>

    <script>
        $('#personas').DataTable({
            responsive: true,
            autoWidth: false,

            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No hay nada para mostrar - disculpa",
                "info": "Mostrando _PAGE_ de _PAGES_",
                "infoEmpty": "No existen registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "buscar",
                "paginate": {
                    'next': "Siguiente",
                    'previous': "Anterior"
                }
            }
        });

    </script>

    @if (session('enable') == 'ok')
        <script>
            Swal.fire({
                icon: 'success',
                position: 'center',
                icon: 'success',
                title: 'El usuario ha sido activado',
                showConfirmButton: false,
                timer: 1500
            })

        </script>
    @endif

    @if (session('disable') == 'ok')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'El usuario ha sido deshabilitado',
                showConfirmButton: false,
                timer: 1500
            })

        </script>
    @endif

@endsection
