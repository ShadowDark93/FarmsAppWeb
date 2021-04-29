@extends('layouts.plantilla')

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">

@endsection

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
                    <div class="col-sm mb-3">
                        <div class="row">
                            <div>
                                <a href="{{ route('farm.create') }}" class="btn btn-success float-right">Agregar</a>
                            </div>
                        </div>
                    </div>
                    @if ($count > 0)
                        <table class="table table-condensed table-bordered table-striped" id="personas">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Nombre Administrador</th>
                                    <th scope="col">Ubicación</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($farms as $farm)
                                    <tr>
                                        <th scope="row">{{ $farm->Name }}</th>
                                        <td>
                                            @if ($farm->AdminName)
                                                {{ $farm->AdminName }}
                                            @else
                                                Sin Administrador
                                            @endif
                                        </td>
                                        <td>{{ $farm->Location }}</td>
                                        <td>
                                            @if ($farm->Phone)
                                                {{ $farm->Phone }}
                                            @else
                                                Sin Teléfono
                                            @endif
                                        </td>
                                        <td>
                                            <div class="container">
                                                <div class="row">
                                                    <a href="{{ route('farm.edit', $farm->id) }}"
                                                        class="btn btn-primary">Editar</a>

                                                    @if ($farm->state == '1')
                                                        <a href="{{ route('farm.disable', $farm->id) }}"
                                                            class="btn btn-danger mx-2">Desactivar</a>
                                                    @else
                                                        <a href="{{ route('farm.enable', $farm->id) }}"
                                                            class="btn btn-success mx-2">Activar</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
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

@section('js')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

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

    @if (session('create') == 'ok')
        <script>
            Swal.fire({
                icon: 'success',
                position: 'center',
                icon: 'success',
                title: 'La finca se ha creado de manera correcta',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif

    @if (session('edited') == 'ok')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'La finca ha sido editada',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif

    @if (session('disable') == 'ok')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'La finca ha sido deshabilitada',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif

    @if (session('enable') == 'ok')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'La finca ha sido habilitada',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif

@endsection
