<div class="row " style="background: #FFFFFF; width: 100%; text-align: center;">
<?php if($resultado['status']==1): ?>
	<h1 style="font-weight: bold;">Bienvenido</h1>
	<h2 style="font-weight: bold;"><?php echo e($resultado['Nombre']); ?></h2>
	<?php if($resultado['Estado']==1): ?>
		<i class="fa fa-exclamation-triangle" style="color: yellow; font-size: 250px; margin-top: 30px;"></i>
		<p>¡Vaya, no encontramos un registro de estado, por favor, verifica los dispositivos!</p>
	<?php endif; ?>
	<?php if($resultado['Estado']==2): ?>
		<i class="fa fa-check-circle" style="color: green; font-size: 250px; margin-top: 30px;"></i>
		<p style="font-size: 20px;">Excelente</p>
	<?php endif; ?>
	<?php if($resultado['Estado']==3): ?>
		<i class="fa fa-times-circle" style="color: red; font-size: 250px; margin-top: 30px;"></i>
		<p style="font-size: 20px;">¡Caida, Verifica el estado físico de la motocicleta!</p>
	<?php endif; ?>
	
	<select id="selectmoto" onchange="setmot($(this).val());" class="" style="width: 450px; font-size: 18px;">
		<option value="none" >Selecciona aquí la moto que deseas monitorear.</option>	
		<?php $__currentLoopData = $Motos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Moto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<option value="<?php echo e($Moto->ID_Motocicleta); ?>" >Marca: <?php echo e($Moto->Marca); ?>, Modelo: <?php echo e($Moto->Modelo); ?>, Placa:<?php echo e($Moto->Placa); ?> </option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
<?php endif; ?>

</div><?php /**PATH C:\xampp\htdocs\SARAM-API\resources\views/Cpanel/inicio.blade.php ENDPATH**/ ?>