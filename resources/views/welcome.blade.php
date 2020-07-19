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
    	<div id="Content" class="" style="width: 100%;">

    	</div>
    	@include('footer')
    	</div>
<div id="Notificaciones" class="modal fade " style="top: 20%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none;">
             <a class="close" data-dismiss="modal" data-target=".Notificaciones" onclick="$('.modal-backdrop').remove();">×</a>
            </div>
         <div class="modal-body" style="text-align: center;">
             <h1 id="Alerta_Status"></h1>
             <p id="Alerta_Mensaje"></p>
         <div class="modal-footer">
             <a href="#" class="btn btn-danger" data-dismiss="modal" data-target=".Notificaciones" onclick="$('.modal-backdrop').remove();">Cerrar</a>
         </div>
        </div>
    </div>
</div>
</div>

    </body>
   <script src="assets/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

</html>
