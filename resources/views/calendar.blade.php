@extends('layouts.app')
@section('content')
    <!--Pleca-->
    <div class="pleca">
        <img class="pleca_superior" src="{{asset('images/Pleca_Superior.jpeg')}}" >
    </div>
    <!--Banner-->
    <div class="banner">
        <a href="/"><img class="logoUAEM" src="{{asset('images/Logo_UAEM.png')}}"></a>
    </div>
    <!--Form-->
    <div class="container">
            <div id="agenda"></div>

    </div>


<!-- Modal -->
<div class="modalC" id="evento">
    <span class="close">&times;</span>
    <form action="date" method="POST">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <label class="fechaL">Fecha: </label>
        <input type="text" id="fecha" class="fecha" name="fecha" readonly> 
        <label class="motivoL">Motivo: </label>
        <textarea  id="motivo" name="motivo" class="motivo" cols="30" rows="10"></textarea>
        <button type="submit"
            
            class=" btn-enviar">Enviar</button>
            
    </form>
</div>

<div class="pdf-class">



   <form action="crearpdf" method="POST">
            
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            
            <input type="text" class="form-control5"  name="cuenta" value="{{$cuenta}}" readonly hidden="true"> <br>
            
            <button type="submit"
            
            value = "Add student" class="btnPDF" >Obtener PDF</button>
            
        </form>  

  



    </div>

</div>


@if (session('SabDom'))
 
 <div class="alerta" id="alerta">
 <div class="fondo_transparente">       
    

        <button onclick="closeD()" id="cerrar" class="modal_cerrar">X</button>
         
         {{ session('SabDom') }}    
      
     </div>

</div>
@endif
<script>
    function closeD() {
    var x = document.getElementById("cerrar");
    var alerta = document.getElementById("alerta");
    if (x.style.display === "none") {
        x.style.display = "block";
        alerta.style.display = "block";
    } else {
        x.style.display = "none";
        alerta.style.display = "none";
    }
}  
</script>

@if (session('status'))
 
 <div class="alertC alert-success" id="alerta">
 <div class="fondo_transparente">       
    

        <button onclick="closeD()" id="cerrar" class="modal_cerrar">X</button>
         
         {{ session('status') }}    
      
     </div>

</div>
@endif

    <!--Pleca Inferior-->
    <div class="pleca">
        <img class="pleca_inferior"  id ="ple_inf" src="{{asset('images/Pleca_Inferior.jpeg')}}" >
    </div>

<script>

        function closeD() {
        var x = document.getElementById("cerrar");
        var alerta = document.getElementById("alerta");
        if (x.style.display === "none") {
            x.style.display = "block";
            alerta.style.display = "block";
        } else {
            x.style.display = "none";
            alerta.style.display = "none";
        }
        }
</script>    
<script>
    var mysql = require('mysql')

    var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "UAEM_Agenda"
    });

    con.connect(function(err) {
    if (err) throw err;
    con.query("SELECT * FROM Alumno", function (err, result, fields) {
        if (err) throw err;
        console.log(result);
    });
    });
</script>
@endsection   
 




