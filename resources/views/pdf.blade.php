<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Styles-->
    <link rel="stylesheet" href="{!! asset('css/estilos.css') !!}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        
    <!--Scripts-->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <title>ALUMINVERSITARIOS</title>
</head>
<body>
    <!--Logo-->  
    <div class="Logo">
        <a href="/"><img class="logoUAEM-pdf" src="{{asset('images/Logo_UAEM.png')}}"></a>
    </div>
    <!--pleca-->
    <div class="">
        <img class="pleca_superior-pdf" src="{{asset('images/Pleca_Superior.jpeg')}}" >
    </div>
    <!--contenido-->
    {{csrf_field()}}
    <li>{{ $cuenta }}</li>
</body>
</html>