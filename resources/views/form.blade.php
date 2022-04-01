<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{!! asset('css/estilos.css') !!}">
    <title>ALUMINVERSITARIOS</title>
</head>
<body>
    <!--Pleca-->
    <div class="pleca">
        <img class="pleca_superior" src="{{asset('images/Pleca_Superior.jpeg')}}" >
    </div>
    <!--Banner-->
    <div class="banner">
        <a href="/"><img class="logoUAEM" src="{{asset('images/Logo_UAEM.png')}}"></a>
    </div>
    <!--Form-->
    
    <div class="form">
    
        <form action="envCuenta" method="POST">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
   
       
            
          <label class="form-group1">MATRÍCULA</label>
            <input type="text" class="form-control1" placeholder="{{$cuenta}}" name="cuenta" value="{{$cuenta}}" readonly>
            <label class="form-group2">NOMBRE</label>
            <input type="text" class="form-control2" placeholder="{{$nombre}}" readonly size="35"> <br>
            <label class="form-group3">PLAN DE ESTUDIO</label>
            <input type="text" class="form-control3" placeholder="{{$plan}}" readonly size="45"> <br>-->

            <button class="btn btn-primary" type="submit">Agendar Cita</button>
        </form>   
        
    </div>
    
    <!--Pleca Inferior-->
    <div class="pleca">
        <img class="pleca_inferior" src="{{asset('images/Pleca_Inferior.jpeg')}}" >
    </div>
</body>
</html>
