<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Materias;
use App\Models\MG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;

class MgController extends Controller
{
    public function mgForm(){
        // $combo = DB::select('select mxg_materiasxgrado.mxg_id, grd_grado.grd_nombre, mat_materia.mat_nombre from mxg_materiasxgrado 
        // INNER JOIN grd_grado on mxg_materiasxgrado.mxg_id_grd=grd_grado.grd_id 
        // INNER JOIN mat_materia on mxg_materiasxgrado.mxg_id_mat = mat_materia.mat_id');
        $comboMaterias = Materias::all();
        $comboGrados = Grado::all();
        return view('mg.mgForm', compact('comboMaterias','comboGrados'));
    }

    public function listMG(){
        $data['mg'] = DB::select('select mxg_materiasxgrado.mxg_id, grd_grado.grd_nombre, mat_materia.mat_nombre from mxg_materiasxgrado 
         INNER JOIN grd_grado on mxg_materiasxgrado.mxg_id_grd=grd_grado.grd_id 
         INNER JOIN mat_materia on mxg_materiasxgrado.mxg_id_mat = mat_materia.mat_id
         order by mxg_materiasxgrado.mxg_id');

        return view('mg.listMG', $data);
    }

    public function saveMG(Request $request){

        $validator = $this->validate($request, [
            'mxg_id_grd'=> 'required',
            'mxg_id_mat'=> 'required',
            

        ]);
        $mgData = request()->except('_token');
        ;MG::insert($mgData);

        return back()->with('mgSave', 'Materia por grado Guardado');                                                                                                                                                                                                                                                                                                                                    
    }

    public function deleteMG($mxg_id){
        $delete = DB::delete('delete from mxg_materiasxgrado where mxg_id= ?', [$mxg_id]);
        
        return back()->with('mgDelete', 'MG Eliminado', $delete);
    }

    public function editFormMG($mxg_id){
        $comboMaterias = Materias::all();
        $comboGrados = Grado::all();
        $editF = DB::select('select * from mxg_materiasxgrado where mxg_id= ?',[$mxg_id]);

        return view('mg.editMG', ['data'=>$editF['0']],compact('comboMaterias','comboGrados'));
    }

    public function editMG(Request $request, $mxg_id){
        $datosMG = request()->except(['_token', '_method']);;
        MG::where('mxg_id', '=', $mxg_id)->update( $datosMG);

        return back()->with('mgUpdate', 'MG Actualizado');

    }
}
