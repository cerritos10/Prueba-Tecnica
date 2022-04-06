@extends('layouts.base')

<div class="container mt-5">
    <div class="card ">
        <div class="card-header text-center">
            Crear Alumno
        </div>
        <div class="card-body">

            @if(session('AlumnoSave'))
            <div class="alert alert-success">
                {{session('AlumnoSave')}}
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
                <form action="{{ url ('/save')}}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <input type="text" name="alm_codigo" class="form-control"  placeholder="Codigo">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="alm_nombre" class="form-control"  placeholder="Nombre">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="alm_edad" class="form-control" placeholder="Edad">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="alm_sexo" class="form-control"  placeholder="Sexo">
                    </div>
                    <div class="col-md-6">
                        <select class="form-select" name="alm_id_grd" id="">
                            @foreach($combo as $item)
                                <option value="{{$item['grd_id']}}">{{$item['grd_nombre']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="alm_observacion" class="form-control"  placeholder="Observacion">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a class="btn btn-light btn-xs mt-5" href="{{url ('/')}}">&laquo volver</a>
</div>