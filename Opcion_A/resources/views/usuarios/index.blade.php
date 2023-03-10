@extends('layouts.layout')

@section("contenido")
    <h1>Usuario</h1>
    <div class="container">
        {{-- <div class="row">
            <div class="col-12">
                <a href="{{route('vuelos.create')}}" class="btn btn-primary mb-3">Insertar Vuelo</a>
                <a target='_blank' href="{{route('vuelos.listado_pdf')}}" class="btn btn-warning mb-3">Listado pdf</a>
            </div>
        </div> --}}
        {{--Usuario: id, nombre(50), apellidos(50), f_nacimiento (date)
Publicaciones: id, usuario_id, titulo(50), publicacion(250), fecha(date)

Ninguna de las tablas tendrá los campos created_at y updated_at. La tabla usuarios tendrá el campo deleted_at y usará el soft delete. --}}
        <table id="tabla" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha Nacimiento</th>
                    <th>Edad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr data-id='{{$usuario->id}}'>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->nombre}}</td>
                    <td>{{$usuario->apellidos}}</td>
                    <td>{{$usuario->f_nacimiento}}</td>
                    {{-- Añadir a la tabla una columna con un accesor llamado edad,
                     que mostrará la edad de los usuarios (1pto) --}}
                     

                    <td><button class="btn btn-danger btn_borrar">Borrar</button></td>
                    {{--<td><a href="{{url('/usuarios')}}/{{$usuario->id}}/edit" class="btn btn-warning btn_editar">Editar</a></td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- El listado del ejercicio anterior se mostrará en una tabla con el plugin Datatable. 
    La tabla deberá mostrar los diferentes apartados en español y permitir sólo ordenar por el campo nombre. (1 pto) --}}
    <script>
        $(document).ready(function(){
            $('#tabla').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se encontraron registros",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "first":      "Primero",
                        "last":       "Último",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                },
                "order": [[ 1, "asc" ]],
                "columnDefs": [
                    { "orderable": false, "targets": [0, 2, 3, 4] }
                ]
            });
        });
        $("#tabla").on("click",".btn_borrar",function(e){
            e.preventDefault();
        
            //confirmar con sweetalert
            Swal.fire({
                title: '¿Estas seguro?',
                text: "No podras revertir esta accion",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borrar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //borrar con ajax
                    const tr=$(this).closest("tr"); //tr más cercano al botón, o sea el tr que contiene al botón
                    const id=tr.data("id"); //obtener el id del tr
                    $.ajax({
                        url: "{{url('/usuarios')}}/"+id,
                        method: "DELETE",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(){
                            tr.fadeOut();
                        }
                    })
                }
            })    
        });
    </script>
@endsection