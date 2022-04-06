@extends('layouts.base')

<div class="container mt-5">
<h1>Lista de materia por grado</h1>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <a class="btn btn-success mb-4" href="{{url('/formMG')}}"> Agregar Materia por grado</a>

            <div class="text-center mb-5">
               @if(session('mgDelete'))
               <div class="alert alert-success   ">
                   {{session('mgDelete')}}
               </div>

                @endif
            <table class="table  table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Grados</th>
                            <th scope="col">Materias</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mg as $data)


                        <tr>
                            <th scope="row">{{$data->mxg_id}}</th>
                            <td>{{$data->grd_nombre}}</td>
                            <td>{{$data->mat_nombre}}</td>
                           
                            <td>
                                <a href="{{route ('editFormMG', $data->mxg_id)}}" class="btn btn-warning btn-sm">Editar</a><br><br>
                                <form action="{{route('deleteMG', $data->mxg_id)}}" method="POST">
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