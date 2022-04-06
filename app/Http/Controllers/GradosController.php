<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;


class GradosController extends Controller
{
    public function listGrado(){
        $data['grado'] = Grado::all();

        return view('grados.listgrados', $data);
    }

    public function gradoForm(){

        return view('grados.gradosForm');
    }

    public function saveGrado(Request $request){

        $validator = $this->validate($request, [
            'grd_nombre'=> 'required|string|max:100',
        ]);
        $grado = request()->except('_token');
        Grado::insert($grado);

        return back()->with('gradoSave', 'Grado Guardado'); 
    }

    public function deleteGrado($grd_id){
        $delete = DB::delete('delete from grd_grado where grd_id= ?', [$grd_id]);
        
        return back()->with('GradoDelete', 'Grado Eliminado', $delete);
    }

    public function editFormGrado($grd_id){
        $editF = DB::select('select * from grd_grado where grd_id= ?',[$grd_id]);

        return view('grados.editgrados', ['data'=>$editF['0']]);
    }

    public function editGrado(Request $request, $grd_id){
        $datosGrado = request()->except(['_token', '_method']);;
        Grado::where('grd_id', '=', $grd_id)->update( $datosGrado);

        return back()->with('gradoEdit', 'Grado Actualizado');

    }
}
