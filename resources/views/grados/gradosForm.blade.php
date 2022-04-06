@extends('layouts.base')

<div class="container mt-5">
    <div class="card ">
        <div class="card-header text-center">
            Crear Grados
        </div>
        <div class="card-body">

            @if(session('gradoSave'))
            <div class="alert alert-success">
                {{session('gradoSave')}}
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
                <form action="{{ url ('/saveGrado')}}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <input type="text" name="grd_nombre" class="form-control"  placeholder="Grado">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a class="btn btn-light btn-xs mt-5" href="{{url ('/listGrado')}}">&laquo volver</a>
</div>