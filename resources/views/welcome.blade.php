<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SARAM-Bienvenido</title>
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <link rel="stylesheet" type="text/css" href="font/css/all.css">
    </head>
    <body class="" style="background: #131313;">
    	<div style="max-height: 110px;">
    	@include('Headers.head') 
    	</div>
    	<div class="fixed" style="padding-top: 110px;">
    	<div class="" style="width: 100%;">
    	@include('Contents.main')		
    	</div>
    	<div id="Servicio">
    	@include('Contents.servicio')	
    	</div>
    	<div id="Galeria">
    		@include('Contents.galeria')
    	</div>
    	<div id="Contacto">
    		@include('Contents.contacto')
    	</div>
    	<div id="Acerca">
    		@include('Contents.acercade')
    	</div>
    	@include('footer')
    	</div>
    </body>
    <script type="text/javascript" src="js/jquery-3.5.1.slim.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</html>
