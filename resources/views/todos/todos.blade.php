@extends('layouts.base')

<div class="container mt-5">
    <h1>Lista de alumnos</h1>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <a class="btn btn-success mb-4" href="{{url('/formAlumno')}}"> Agregar Alumno</a>
            <a class="btn btn-success mb-4" href="{{url('/')}}"> Inicio</a>
            <select class="form-select" name="alm_id_grd" id="alumno_id" onchange="ALChannge()">
                <option value="0"> Seleccione </option>
                <option value="0"> Todos </option>
                @foreach($combo as $item)

                <option value="{{$item['alm_id']}}">{{$item['alm_nombre']}}</option>
                @endforeach
            </select>
            <div class="text-center mb-5">
                <table class="table  table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Alumno</th>
                            <th scope="col">Grado</th>
                            <th scope="col">Materias</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#alumno_id').change(function() {
            var seleccion = $(this).children("option:selected").val();
            localStorage.setItem('selected',seleccion)
        });
    })

    function ALChannge() {
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: 'todosAll',
            success: function(response) {
                var data = ""
                var selec = localStorage.getItem('selected')
                if (selec == 0 ) {
                $.each(response, function(key, value) {
                        data = data + "<tr>"
                        data = data + "<td>" + value.id + "</td>"
                        data = data + "<td>" + value.Alumno + "</td>"
                        data = data + "<td>" + value.Grado + "</td>"
                        data = data + "<td>" + value.Materias + "</td>"        
                })
                $('tbody').html(data);
            }
            $.each(response, function(key, value) {
                   
                if (selec==value.id) {
                    data = data + "<tr>"
                   data = data + "<td>" + value.id + "</td>"
                   data = data + "<td>" + value.Alumno + "</td>"
                   data = data + "<td>" + value.Grado + "</td>"
                   data = data + "<td>" + value.Materias + "</td>"
                }
           })
           $('tbody').html(data);
                
            }
        });
    }

   
</script>