@extends('layouts.base')

<div class="container mt-5">
<h1>Lista de alumnos</h1>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <a class="btn btn-success mb-4" href="{{url('/formAlumno')}}"> Agregar Alumno</a>
            <div class="text-center mb-5">
               @if(session('AlumnoDelete'))
               <div class="alert alert-success   ">
                   {{session('AlumnoDelete')}}
               </div>

                @endif
            <table class="table  table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Codigo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Grado</th>
                            <th scope="col">Observacion</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumnos as $alum)


                        <tr>
                            <th scope="row">{{$alum->alm_id}}</th>
                            <td>{{$alum->alm_codigo}}</td>
                            <td>{{$alum->alm_nombre}}</td>
                            <td>{{$alum->alm_edad}}</td>
                            <td>{{$alum->alm_sexo}}</td>
                            <td>{{$alum->grd_nombre}}</td>
                            <td>{{$alum->alm_observacion}}</td>
                            <td>
                                <a href="{{route ('editForm', $alum->alm_id)}}" class="btn btn-primary">Editar</a>
                                <form action="{{route('delete', $alum->alm_id)}}" method="POST">
                                    @csrf @method('DELETE')

                                    <button type="submit" onclick="return confirm('¿borrar?');" class="btn btn-danger">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>