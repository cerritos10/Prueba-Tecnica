@extends('layouts.base')

<div class="container mt-5">
    <div class="card ">
        <div class="card-header text-center">
            Editar Alumno
        </div>
        <div class="card-body">

            @if(session('AlumnoUpdate'))
            <div class="alert alert-success">
                {{session('AlumnoUpdate')}}
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
                <form action="{{ route('edit',$data->alm_id)}}" method="post" class="row g-3">
                @method('PATCH')
                @csrf
                    <div class="col-md-6">
                        <input type="text" name="alm_codigo" class="form-control" value="{{$data->alm_codigo}}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="alm_nombre" class="form-control"  value="{{$data->alm_nombre}}">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="alm_edad" class="form-control" value="{{$data->alm_edad}}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="alm_sexo" class="form-control" value="{{$data->alm_sexo}}">
                    </div>
                    <div class="col-md-6">
                        <select class="form-select" name="alm_id_grd" id="">
                            @foreach($combo as $item)
                                <option value="{{$item['grd_id']}}">{{$item['grd_nombre']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="alm_observacion" class="form-control"  value="{{$data->alm_observacion}}">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a class="btn btn-light btn-xs mt-5" href="{{url ('/')}}">&laquo volver</a>
</div>