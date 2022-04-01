<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Styles-->
    <link rel="stylesheet" href="./css/estilos.css">
    
        
    <!--Scripts-->
    
    
    <title>ALUMINVERSITARIOS</title>
</head>
<body>
    <!--Logo-->  
    <div class="Logo">
        <a href="/"><img class="logoUAEM-pdf" src="./images/Logo_UAEM.png"></a>
    </div>
    <!--pleca-->
    <div class="">
        <img class="pleca_superior-pdf" src="./images/Pleca_Superior.jpeg" >
    </div>
    <!--contenido-->
    {{csrf_field()}}

   <div class="contenido">
        <label class="labelPDF1">Cuenta : </label>
        <p class="p1" >{{$cuenta}}</p>
        <label class="labelPDF2">Nombre : </label>
        <p class="p2">{{$nombre}}</p>
     <label class="labelPDF3">Espacio : </label>
        <p class="p3">{{$espacio}}</p>
        <label class="labelPDF4">Plan : </label>
        <p class="p4">{{$plan}}</p>
        <label class="labelPDF5">Fecha : </label>
        <p class="p5">{{$fecha}}</p>
        <label class="labelPDF6">Motivo : </label>
        <p class="p6">{{$motivo}}</p>
   </div>
 
</body>
</html>