<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Redirect;
use View;


class UserController extends Controller
{



    public function insertForm(){
        return view ('welcome');
    }


    public function getDate(Request $req){
        $fecha= $req->fecha;
        $resFecha = substr($fecha, 0 , -54);
        $motivo = $req->motivo;
        $cuenta = $req['cuenta'];
        
        $contador = 0;
        if($resFecha == 'Sat' || $resFecha == 'Sun'){
            return redirect('/calendar')->with('SabDom', 'No se pueden agendar citas los fines de semana');
           return back()->withInput();
        }else{
            for ($i = 0; $i<3;$i++){
                DB::insert('insert into cita (fecha, motivo) values (curdate(), ?)', [$motivo]);
                if($i>3){
                    dd("Ha alcanzado el máximo por día");
                }
            }
            return view ('calendar')->with('cuenta', $cuenta);
        }
    }

    public function getCuenta(Request $req){
            $req -> input('$cuenta');

        dd($req->cuenta);
           return View::make('calendar')->with('cuenta', $numCuenta);
            
           return view ('calendar');
           return back()->withInput();
    }

    public function pdf($cuenta){          
      
           $api = env('API_ENDPOINT');           
           $numCuenta = $req->matricula;
           $res = $api.$req->matricula;
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
                       
               

                $pdf = \PDF::loadView('pdf', $data);             
                $pdf->stream('cita-pdf.pdf' );   
                DB::delete('delete from cita');


       }
   
           
       }

    public function getData(Request $req){
        $api = env('API_ENDPOINT');
        $numCuenta = $req->matricula;
        $res = $api.$req->matricula;
        $res = Http::get($res);
        
        
        
        
        if ($res['estado']==2){
           
           return redirect('/')->with('status', 'Número de cuenta '. $numCuenta . ' incorrecto');
           return back()->withInput();
        }else{
            $meta = $res['meta'];
            $cuenta = $meta['cuenta'];
            $nombre = $meta['nombre'];
            $CoP = $meta['codigopostal'];
            $espacio = $meta['espacio'];
            $plan = $meta ['plan'];
            $egreso = $meta ['egreso'];
            $titulacion = $meta ['titulacion'];
            $sqlAlumno = DB::select ('select * from Alumno where cuenta = ?', [$cuenta]);
            $sqlEspacio = DB::select ('select * from Espacio where espacio = ?', [$espacio]);
            $sqlPlan = DB::select ('select * from Plan where plan = ?', [$plan]);
            if ($sqlAlumno == null){
                DB::insert ('Insert into alumno (Cuenta, nombre, CodigoPostal)values (?,?,?)', [$cuenta, $nombre, $CoP]);               
            }
            if ($sqlEspacio == null){
                DB::insert ('Insert into espacio (Espacio) values (?)', [$espacio]);
            }
            if ($sqlPlan == null){
                DB::insert ('insert into plan (Plan, Egreso, Titulacion) values (?,?,?)', [$plan, $egreso, $titulacion]);
            }
      
     
            return View::make('form')->with('cuenta', $cuenta)->with('nombre', $nombre)->with('plan', $plan);
            
            return view ('form');
            return back()->withInput();
         
        }
        

  
    }    
 



 
}
