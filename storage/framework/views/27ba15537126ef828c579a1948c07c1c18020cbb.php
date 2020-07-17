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
    	<?php echo $__env->make('Headers.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    	</div>
    	<div class="fixed" style="padding-top: 110px;">
    	<div class="" style="width: 100%;">
    	<?php echo $__env->make('Contents.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>		
    	</div>
    	<div id="Servicio">
    	<?php echo $__env->make('Contents.servicio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
    	</div>
    	<div id="Galeria">
    		<?php echo $__env->make('Contents.galeria', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    	</div>
    	<div id="Contacto">
    		<?php echo $__env->make('Contents.contacto', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    	</div>
    	<div id="Acerca">
    		<?php echo $__env->make('Contents.acercade', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    	</div>
    	<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    	</div>
    </body>
    <script type="text/javascript" src="js/jquery-3.5.1.slim.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</html>
<?php /**PATH /var/www/saram.com/resources/views/welcome.blade.php ENDPATH**/ ?>