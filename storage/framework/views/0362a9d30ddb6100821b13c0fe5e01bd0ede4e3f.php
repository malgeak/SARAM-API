<!DOCTYPE html>
<html>
<head>
	<title>Correo-Autogenerado desde Contacto</title>
</head>
<body>
	<div style="text-align: center;">
		<img src="http://saram.com/img/saram.png" style="width: 250px; height: 250px;">
		<br><br>
		<strong>Mensaje generado desde contacto:</strong>
		<p>Hola <?php echo e($Nombre); ?>, necesita ponerse en contacto. Su petición es:<br>
			<?php echo e($Mensaje); ?> <br>
		 porfavor, contactalo en el menor tiempo posible, nuestra prioridad es ofrecer el mejor servicio, estos son sus contactos.
		 <?php if(isset($Telefono)): ?>
		 Telefono: <?php echo e($Telefono); ?>

		 <?php endif; ?><br>
		 <?php if(isset($Correo)): ?>
		 Telefono: <?php echo e($Correo); ?>

		 <?php endif; ?>
		</p>
	</div>
</body>
</html><?php /**PATH /var/www/saram.com/resources/views/Emails/contacto.blade.php ENDPATH**/ ?>