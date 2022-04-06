@extends('layouts.base')

<div class="container mt-5">
    <div class="card ">
        <div class="card-header text-center">
            Editar Materias
        </div>
        <div class="card-body">

            @if(session('MateriaEdit'))
            <div class="alert alert-success">
                {{session('MateriaEdit')}}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card" style="padding: 10px;">
                <form action="{{ route('editMaterias',$data->mat_id)}}" method="post" class="row g-3">
                @method('PATCH')
                @csrf
                    <div class="col-md-6">
                        <input type="text" name="mat_nombre" class="form-control" value="{{$data->mat_nombre}}">
                    </div>
                    
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a class="btn btn-light btn-xs mt-5" href="{{url ('/listMaterias')}}">&laquo volver</a>
</div>