<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;

class MateriasController extends Controller
{
    public function listMaterias(){
        $data['materia'] = Materias::all();

        return view('materias.listMaterias', $data);
    }

    public function materiasForm(){

        return view('materias.materiasForm');
    }

    public function saveMaterias(Request $request){

        $validator = $this->validate($request, [
            'mat_nombre'=> 'required|string|max:100',
        ]);
        $materias = request()->except('_token');
        Materias::insert($materias);

        return back()->with('materiasSave', 'Materias Guardadas'); 
    }

    public function deleteMaterias($mat_id){
        $delete = DB::delete('delete from mat_materia where mat_id= ?', [$mat_id]);
        
        return back()->with('MateriaDelete', 'Materia Eliminada', $delete);
    }

    public function editFormMaterias($mat_id){
        $editF = DB::select('select * from mat_materia where mat_id= ?',[$mat_id]);

        return view('materias.editMaterias', ['data'=>$editF['0']]);
    }

    public function editMaterias(Request $request, $mat_id){
        $datosMate = request()->except(['_token', '_method']);;
        Materias::where('mat_id', '=', $mat_id)->update( $datosMate);

        return back()->with('MateriaEdit', 'Materia Actualizada');

    }
}
