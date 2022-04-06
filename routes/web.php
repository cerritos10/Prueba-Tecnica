<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('alumnos.listar');
});

//CRUD alumnos
Route::get('/', 'App\Http\Controllers\AlumnoController@list');
Route::get('/formAlumno', 'App\Http\Controllers\AlumnoController@alumnoForm');
Route::post('/save', 'App\Http\Controllers\AlumnoController@save')->name('save');
Route::delete('/delete/{alm_id}', 'App\Http\Controllers\AlumnoController@delete')->name('delete');
Route::get('/editForm/{alm_id}', 'App\Http\Controllers\AlumnoController@editForm')->name('editForm');
Route::patch('/edit/{alm_id}', 'App\Http\Controllers\AlumnoController@edit')->name('edit');

//AJAX materias por alumno
Route::get('/todos', 'App\Http\Controllers\TodoController@todos');
Route::get('/todosAll', 'App\Http\Controllers\TodoController@todosAll');

//CRUD materias
Route::get('/listMaterias', 'App\Http\Controllers\MateriasController@listMaterias');
Route::get('/formMaterias', 'App\Http\Controllers\MateriasController@materiasForm');
Route::post('/saveMaterias', 'App\Http\Controllers\MateriasController@saveMaterias')->name('saveMaterias');
Route::delete('/deleteMaterias/{mat_id}', 'App\Http\Controllers\MateriasController@deleteMaterias')->name('deleteMaterias');
Route::get('/editFormMaterias/{mat_id}', 'App\Http\Controllers\MateriasController@editFormMaterias')->name('editFormMaterias');
Route::patch('/editMaterias/{mat_id}', 'App\Http\Controllers\MateriasController@editMaterias')->name('editMaterias');

//CRUD Grado
Route::get('/listGrado', 'App\Http\Controllers\GradosController@listGrado');
Route::get('/formGrado', 'App\Http\Controllers\GradosController@gradoForm');
Route::post('/saveGrado', 'App\Http\Controllers\GradosController@saveGrado')->name('saveGrado');
Route::delete('/deleteGrado/{grd_id}', 'App\Http\Controllers\GradosController@deleteGrado')->name('deleteGrado');
Route::get('/editFormGrado/{grd_id}', 'App\Http\Controllers\GradosController@editFormGrado')->name('editFormGrado');
Route::patch('/editGrado/{grd_id}', 'App\Http\Controllers\GradosController@editGrado')->name('editGrado');

//CRUD mxGRado
Route::get('/listMG', 'App\Http\Controllers\MgController@listMG');
Route::get('/formMG', 'App\Http\Controllers\MgController@mgForm');
Route::post('/saveMG', 'App\Http\Controllers\MgController@saveMG')->name('saveMG');
Route::delete('/deleteMG/{mxg_id}', 'App\Http\Controllers\MgController@deleteMG')->name('deleteMG');
Route::get('/editFormMG/{mxg_id}', 'App\Http\Controllers\MgController@editFormMG')->name('editFormMG');
Route::patch('/editMG/{mxg_id}', 'App\Http\Controllers\MgController@editMG')->name('editMG');
