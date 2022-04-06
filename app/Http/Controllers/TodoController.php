<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;

class TodoController extends Controller
{
    // public function getAlumnos(){
    //     // $combo = Alumno::all();
    //     // return $combo;
    // }

    public function todos(){
        $combo = Alumno::all();
        $data['alumnos'] = DB::select('select alm_alumno.alm_nombre as Alumno, grd_grado.grd_nombre as Grado, mat_materia.mat_nombre as Materias
        FROM alm_alumno 
        INNER join grd_grado on grd_grado.grd_id = alm_alumno.alm_id_grd 
        INNER JOIN mxg_materiasxgrado on grd_grado.grd_id = mxg_materiasxgrado.mxg_id_grd 
        INNER join mat_materia on mxg_materiasxgrado.mxg_id_mat = mat_materia.mat_id');

        return view('todos.todos', $data,compact('combo'));

        //return $data;
    }

    public function todosAll(){
        //$Alum = Alumno::all();

        $data= DB::select('select alm_alumno.alm_id as id, alm_alumno.alm_nombre as Alumno, grd_grado.grd_nombre as Grado, mat_materia.mat_nombre as Materias
        FROM alm_alumno 
        INNER join grd_grado on grd_grado.grd_id = alm_alumno.alm_id_grd 
        INNER JOIN mxg_materiasxgrado on grd_grado.grd_id = mxg_materiasxgrado.mxg_id_grd 
        INNER join mat_materia on mxg_materiasxgrado.mxg_id_mat = mat_materia.mat_id');
        return response()->json($data);
    }
}
