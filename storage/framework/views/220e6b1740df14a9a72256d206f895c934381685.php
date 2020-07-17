<div class="row" style="position: relative;">
<?php
$x=0;
?>
<?php $__currentLoopData = $contactos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="col-xs-12 col-sm-6 col-md-4" data-toggle="modal" data-target=".<?php echo e($x); ?>" style="margin-top: 50px;">
		<div class="panel panel-default" style="">
			<div class="text-center" style="width: 100%; height: 250px;">
				<i class="fa fa-user rounded-circle" style="font-size: 250px; color: grey; width: 100%; height: 100%;"></i>
			</div>
			<div class="panel-heading">
				<p class="text-center"><?php echo e($contacto->Nombre); ?> <?php echo e($contacto->Apellidos); ?></p><br>
				Telfono: <?php echo e($contacto->Numero_Tel); ?>

				<br>
				Correo: <?php echo e($contacto->Correo); ?>

			</div>

		</div>
	</div>
	<?php
	$x=$x+1;
	?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<button class="circle" data-toggle="modal" data-target=".addcontact" style="margin-top: -15px;">
	<i class="fa fa-plus" aria-hidden="true" ></i>
</button>
<?php
$x=0;
?>
<?php $__currentLoopData = $contactos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal <?php echo e($x); ?> fade ">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             <a class="close" data-dismiss="modal" data-target=".<?php echo e($x); ?>">×</a>
         	</div>
         <div class="modal-body">
             <p>Para actualizar la información, por favor da clic en guardar.</p>
             Nombre
			<div class="row" style="text-align: center;">
				<div style="width: 7%; height: 20px; float: left;"></div>
				<label class="" style="font-size: 40px; width: 20%; float: left;"><i class="fa fa-user"></i>
				</label>
				<input id="<?php echo e($x); ?>N" class="form-control" type="text" style="width: 60%; float: left; font-size: 25px; margin-top: 13px;" name="Nombre" value="<?php echo e($contacto->Nombre); ?>" placeholder="ej: Raúl">
			</div>
			Apellido
			<div class="row" style="text-align: center;">
				<div style="width: 7%; height: 20px; float: left;"></div>
				<label class="" style="font-size: 40px; width: 20%; float: left;"><i class="fa fa-user"></i>
				</label>
				<input id="<?php echo e($x); ?>A" class="form-control" type="text" style="width: 60%; float: left; font-size: 25px; margin-top: 13px;" name="Apellidos" value="<?php echo e($contacto->Apellidos); ?>" placeholder="ej: Hernandez">
			</div>
			Celular			
			<div class="row" style="text-align: center;">
				<div style="width: 7%; height: 20px; float: left;"></div>
				<label class="" style="font-size: 40px; width: 20%; float: left;"><i class="fa fa-phone"></i>
				</label>
				<input class="form-control" disabled="true;}" type="phone" style="width: 60%; float: left; font-size: 25px; margin-top: 13px;" name="Numero_Tel" value="<?php echo e($contacto->Numero_Tel); ?>" placeholder="ej: 55 2233 2233">
			</div>
			Correo			
			<div class="row" style="text-align: center;">
				<div style="width: 7%; height: 20px; float: left;"></div>
				<label class="" style="font-size: 40px; width: 20%; float: left;"><i class="fa fa-envelope"></i>
				</label>
				<input id="<?php echo e($x); ?>C" class="form-control" type="email" style="width: 60%; float: left; font-size: 25px; margin-top: 13px;" name="Correo" value="<?php echo e($contacto->Correo); ?>" placeholder="ej: example@saram.com">
			</div>
         </div>
         <div class="modal-footer">
             <a href="#" class="btn btn-success" onclick="updatecontacto($('#<?php echo e($x); ?>N').val(), $('#<?php echo e($x); ?>A').val(), '<?php echo e($contacto->Numero_Tel); ?>', $('#<?php echo e($x); ?>C').val());">Guardar</a>
             <a href="#" class="btn btn-info" data-dismiss="modal" data-target=".<?php echo e($x); ?>">Cancelar</a>
             <a class="btn btn-danger" data-toggle="modal"
	 			data-target=".<?php echo e($x); ?>d"><i class="fa fa-trash-o" style="font-size: 18px; color: white; z-index: 3; border: none;" ></i></a>
         </div>
        </div>
    </div>
</div>
<div class="modal <?php echo e($x); ?>d fade " style="top: 20%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             <a class="close" data-dismiss="modal" data-target=".<?php echo e($x); ?>d">×</a>
         	</div>
         <div class="modal-body">
             <p>¿Esta seguro que desea eliminar esté contacto?</p>
         <div class="modal-footer">
             <a href="#" class="btn btn-success" onclick="deletecontacto('<?php echo e($contacto->Numero_Tel); ?>', '<?php echo e($x); ?>')">Si</a>
             <a href="#" class="btn btn-danger" data-dismiss="modal" data-target=".<?php echo e($x); ?>d">Cancelar</a>
         </div>
        </div>
    </div>
</div>
</div>
<?php
	$x=$x+1;
	?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div class="modal addcontact fade ">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             <a class="close" data-dismiss="modal" data-target=".addcontact">×</a>
         	</div>
         <div class="modal-body">
             <p>Para agregar un nuevo contacto, llena los campos y despues da clic en guardar. (*) Obligatorio</p>
             Nombre *
			<div class="row" style="text-align: center;">
				<div style="width: 7%; height: 20px; float: left;"></div>
				<label class="" style="font-size: 40px; width: 20%; float: left;"><i class="fa fa-user"></i>
				</label>
				<input id="nNombre" class="form-control" type="text" style="width: 60%; float: left; font-size: 25px; margin-top: 13px;" name="Nombre" value="" placeholder="ej: Raúl">
			</div>
			Apellidos
			<div class="row" style="text-align: center;">
				<div style="width: 7%; height: 20px; float: left;"></div>
				<label class="" style="font-size: 40px; width: 20%; float: left;"><i class="fa fa-user"></i>
				</label>
				<input id="nApellidos" class="form-control" type="text" style="width: 60%; float: left; font-size: 25px; margin-top: 13px;" name="Apellidos" value="" placeholder="ej: Hernandez">
			</div>
			Celular	*		
			<div class="row" style="text-align: center;">
				<div style="width: 7%; height: 20px; float: left;"></div>
				<label class="" style="font-size: 40px; width: 20%; float: left;"><i class="fa fa-phone"></i>
				</label>
				<input id="nCelular" class="form-control" type="phone" style="width: 60%; float: left; font-size: 25px; margin-top: 13px;" name="Numero_Tel" value="" placeholder="ej: 55 2233 2233">
			</div>
			Correo			
			<div class="row" style="text-align: center;">
				<div style="width: 7%; height: 20px; float: left;"></div>
				<label class="" style="font-size: 40px; width: 20%; float: left;"><i class="fa fa-envelope"></i>
				</label>
				<input id="nCorreo" class="form-control" type="email" style="width: 60%; float: left; font-size: 25px; margin-top: 13px;" name="Correo" value="" placeholder="ej: example@saram.com">
			</div>
         </div>
         <div class="modal-footer">
             <a href="#" class="btn btn-success" onclick="newcontacto($('#nNombre').val(), $('#nApellidos').val(), $('#nCelular').val(), $('#nCorreo').val());">Guardar</a>
             <a href="#" class="btn btn-info" data-dismiss="modal" data-target=".addcontact">Cancelar</a>
         </div>
        </div>
    </div>
</div>
</div>
<?php /**PATH /var/www/saram.com/resources/views/Cpanel/contactos.blade.php ENDPATH**/ ?>