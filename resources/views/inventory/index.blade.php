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
                                    <a class="nav-link" href="{{ route('home') }}">Inicio </a>
                                </li>
                                <li class="nav-item">
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

                <div class="card-body">

                    <div class="col-sm mb-3">
                        <div class="row">
                            <div class="sm-6">
                                <h4 style="color:green" class="float-right"> Valor total inventario:
                                    <span>{{ $total }}</span>
                                </h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="sm-6">
                                <a href="{{ route('inventario.create') }}" class="btn btn-success float-left">Agregar</a>
                            </div>
                        </div>

                    </div>

                    @if ($data->count() > 0)
                        <table id="inventario"
                            class="table table-striped table-hover table-bordered table-responsive{-sm|-md|-lg|-xl|-xxl">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Código Interno</>
                                    <th scope="col">Ubicación</th>
                                    <th scope="col">Categoría</th>
                                    <th scope="col">Sexo</th>
                                    <th scope="col">Tercerizado</th>
                                    <th scope="col">Nombre Tercero</th>
                                    <th scope="col">Peso</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <th scope="row">{{ $d->InternalCode }}</th>
                                        <td>{{ $d->farm->Name }}</td>
                                        <td>
                                            @if ($d->Category == '1')
                                                Ganado vacuno o bovino
                                            @elseif($d->Category=='2')
                                                Ganado aviar
                                            @elseif($d->Category=='3')
                                                Ganado equino
                                            @elseif($d->Category=='4')
                                                Ganado porcino
                                            @elseif($d->Category=='5')
                                                Ganado ovino
                                            @endif
                                        </td>
                                        <td>{{ $d->Sex }}</td>
                                        <td>
                                            @if ($d->third == 1)
                                                Sí
                                            @else
                                                No
                                            @endif
                                        </td>
                                        <td>
                                            @if ($d->third == 1)
                                                {{ $d->ThirdName }}
                                            @else
                                                No aplica.
                                            @endif
                                        </td>
                                        <th>
                                            @if ($d->peso != null)
                                                {{ $d->peso }} KG
                                            @else
                                                Sin peso registrado
                                            @endif
                                        </th>
                                        <th>
                                            @if ($d->valor != null)
                                                {{ $d->valor }} Pesos
                                            @else
                                                Sin valor registrado
                                            @endif
                                        </th>
                                        <td>
                                            @if ($d->state == 1)
                                                Activo
                                            @elseif($d->state==2)
                                                Vendido
                                            @elseif($d->state==3)
                                                Trasladado
                                            @elseif($d->state==0)
                                                Muerto
                                            @endif
                                        </td>
                                        <td>
                                            @if ($d->state != 1)
                                                <span class="badge badge-danger">No se puede modificar este animal</span>
                                                <a href="{{ route('peso.show', 0) }}"
                                                    class="btn btn-sm btn-warning">Pesaje y Valor</a>
                                            @else
                                                <a href="{{ route('inventario.edit', $d->id) }}"
                                                    class="btn btn-primary">Editar</a>
                                                <a href="{{ route('peso.show', $d->id) }}"
                                                    class="btn btn-sm btn-warning">Pesaje y Valor</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger" role="alert">
                            Actualmente no posee registro de inventario.
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
        $('#inventario').DataTable({
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

    @if (session('created') == 'ok')
        <script>
            Swal.fire({
                icon: 'success',
                position: 'center',
                icon: 'success',
                title: 'El elemento se ha creado de manera correcta',
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
                title: 'El elemento ha sido editado de manera correcta',
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
                title: 'El elemento ha sido dado de baja',
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

    {{-- auto colocar miles --}}
    <script>
        $("#valor").on({
            "focus": function(event) {
                $(event.target).select();
            },
            "keyup": function(event) {
                $(event.target).val(function(index, value) {
                    return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                });
            }
        });
    </script>

    <script>
        $("#Peso").on({
            "focus": function(event) {
                $(event.target).select();
            },
            "keyup": function(event) {
                $(event.target).val(function(index, value) {
                    return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                });
            }
        });
    </script>

@endsection
