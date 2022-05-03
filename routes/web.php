<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use App\Http\Controllers\UserController ;
use Illuminate\Http\Request;

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
    return view('welcome');
});


Route::get('calendar', function(){
    return view ('calendar');
});

Route::post("users",[UserController::class, 'getData']);

Route::any("envCuenta", function(Request $request){
    $cuenta = $request->only('cuenta');
    View::share('cuenta', $cuenta['cuenta']);
    return view ('calendar');
});

Route::resource('date',UserController::class);

Route::post('date',[UserController::class, 'getDate']);


Route::get('form', function(){
    return view ('form');
});





Route::any('crearpdf',function (Request $request){
    $cuenta = $request->only('cuenta');
    
    $api = env('API_ENDPOINT');           
    
    $numCuenta = $cuenta['cuenta'];
    $res = $api.$cuenta['cuenta'];
    
    $res = Http::get($res);
    $meta = $res['meta'];
    $cuenta = $meta['cuenta'];
    $nombre = $meta['nombre'];
    $espacio = $meta['espacio'];
    $plan = $meta ['plan'];
  
    $mot = DB::select('select motivo from cita');
    $fec = DB::select('select fecha from cita');
    $sqlfecha = DB::select('select * from cita');
    
    if($sqlfecha == null){        
        return view ('calendar')->with('cuenta', $numCuenta );    
        return redirect('/calendar')->with('status', 'Fecha y/o motivo no seleccionados');
        return back()->withInput();
    }else{
        $motivo = $mot[0]->motivo;
 
        $fecha =$fec[0]->fecha;
          $data = [
              'cuenta' =>$cuenta,
              'nombre' =>$nombre,
              'espacio' => $espacio,
              'plan' => $plan,
              'motivo' => $motivo,
              'fecha' => $fecha
          
          ];            
              
      
       DB::delete('delete from cita');
       $pdf = \PDF::loadView('pdf', $data);   
       $pdf -> render();          
       return $pdf->download('cita-pdf.pdf' );   
       DB::delete('delete from cita');


}
});





Route::get ('gfg', function() {
    return view ('pdf');
});




Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

