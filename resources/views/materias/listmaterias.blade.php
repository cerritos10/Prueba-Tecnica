@extends('layouts.base')

<div class="container mt-5">
<h1>Lista de Materias</h1>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <a class="btn btn-success mb-4" href="{{url('/formMaterias')}}"> Agregar Materia</a>
            <a class="btn btn-success mb-4" href="{{url('/todos')}}"> Materias por alumno</a>
            <div class="text-center mb-5">
               @if(session('MateriaDelete'))
               <div class="alert alert-success   ">
                   {{session('MateriaDelete')}}
               </div>

                @endif
            <table class="table  table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Materias</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($materia as $data)


                        <tr>
                            <th scope="row">{{$data->mat_id}}</th>
                            <td>{{$data->mat_nombre}}</td>
                            
                            <td>
                                <a href="{{route ('editFormMaterias', $data->mat_id)}}" class="btn btn-warning btn-sm" style="margin-bottom: 2px;">Editar</a>
                                <form action="{{route('deleteMaterias', $data->mat_id)}}" method="POST">
                                    @csrf @method('DELETE')

                                    <button type="submit" onclick="return confirm('¿borrar?');" class="btn btn-danger btn-sm">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <a class="btn btn-light btn-xs mt-5" href="{{url ('/')}}">&laquo home</a>
        </div>
    </div>
</div>