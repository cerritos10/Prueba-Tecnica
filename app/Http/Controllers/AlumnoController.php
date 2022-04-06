<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Grado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;

class AlumnoController extends Controller
{
    public function alumnoForm(){
        $combo = Grado::all();
        return view('alumnos.alumnoForm', compact('combo'));
    }

    public function list(){
        $data['alumnos'] = DB::select('select alm_id,alm_codigo,alm_nombre,alm_edad,alm_sexo,grado.grd_nombre,alm_observacion FROM alm_alumno INNER JOIN grd_grado as grado on alm_alumno.alm_id_grd = grado.grd_id');

        return view('alumnos.list', $data);
    }

    public function save(Request $request){

        $validator = $this->validate($request, [
            'alm_codigo'=> 'required|string|max:100',
            'alm_nombre'=> 'required|string|max:300',
            'alm_edad'=> 'required|int',
            'alm_sexo'=> 'required|string|max:100',
            'alm_id_grd'=> 'required|int',
            'alm_observacion'=> 'required|string|max:300'

        ]);
        $alumnoData = request()->except('_token');
        Alumno::insert($alumnoData);

        return back()->with('AlumnoSave', 'Alumno Guardado');                                                                                                                                                                                                                                                                                                                                    
    }

    public function delete($alm_id){
        $delete = DB::delete('delete from alm_alumno where alm_id= ?', [$alm_id]);
        
        return back()->with('AlumnoDelete', 'Alumno Eliminado', $delete);
    }

    public function editForm($alm_id){
        $combo = Grado::all(); 
        $editF = DB::select('select * from alm_alumno where alm_id= ?',[$alm_id]);

        return view('alumnos.editForm', ['data'=>$editF['0']],compact('combo'));
    }

    public function edit(Request $request, $alm_id){
        $datosAlumno = request()->except(['_token', '_method']);;
        Alumno::where('alm_id', '=', $alm_id)->update( $datosAlumno);

        return back()->with('AlumnoUpdate', 'Alumno Actualizado');

    }
}
