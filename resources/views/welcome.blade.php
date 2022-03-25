<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Styles-->
    <link rel="stylesheet" href="{!! asset('css/estilos.css') !!}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        @livewireStyles>
    <!--Scripts-->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
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
        <form action="users" method="POST">
            
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <label class="form-group">MATRÍCULA</label>
            <input type="number" class="form-control" placeholder="Matrícula" name="matricula" > <br>
            <button type="submit"
            
            value = "Add student" class="btn btn-primary" >Enviar</button>
            
        </form>   
       

    </div>
    @if (session('status'))
 
    <div class="alert alert-success" id="alerta">
    <div class="fondo_transparente">       
       
 
           <button onclick="closeD()" id="cerrar" class="modal_cerrar">X</button>
            
            {{ session('status') }}    
         
        </div>
   
</div>
@endif
    <!--Pleca Inferior-->
    <div class="pleca">
        <img class="pleca_inferior" src="{{asset('images/Pleca_Inferior.jpeg')}}" >
    </div>

   
    </div>
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
</body>
</html>
