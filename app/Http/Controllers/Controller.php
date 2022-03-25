<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getDate(Request $req){
        $fecha= $req->fecha;
        $resFecha = substr($fecha, 0 , -54);
        $motivo = $req->motivo;
        
        $contador = 0;
        if($resFecha == 'Sat' || $resFecha == 'Sun'){
            return redirect('/calendar')->with('SabDom', 'No se pueden agendar citas los fines de semana');
           return back()->withInput();
        }else{
            while($contador < 3){                
                DB::insert('insert into cita (fecha, motivo) values (curdate(), ?)', [$motivo]);
                $contador++;
            }
        }
    }

  


}
