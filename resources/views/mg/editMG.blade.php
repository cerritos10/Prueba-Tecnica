@extends('layouts.base')

<div class="container mt-5">
    <div class="card ">
        <div class="card-header text-center">
            Editar MG
        </div>
        <div class="card-body">

            @if(session('mgUpdate'))
            <div class="alert alert-success">
                {{session('mgUpdate')}}
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
                <form action="{{ route('editMG',$data->mxg_id)}}" method="post" class="row g-3">
                @method('PATCH')
                @csrf
                    
                <div class="col-md-6">
                        <select class="form-select" name="mxg_id_mat" id="">
                            @foreach($comboMaterias as $item)
                                <option value="{{$item['mat_id']}}">{{$item['mat_nombre']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select class="form-select" name="mxg_id_grd" id="">
                            @foreach($comboGrados as $item)
                                <option value="{{$item['grd_id']}}">{{$item['grd_nombre']}}</option>
                            @endforeach
                        </select>
                    </div>
                   
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a class="btn btn-light btn-xs mt-5" href="{{url ('/listMG')}}">&laquo volver</a>
</div>