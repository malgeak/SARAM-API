  <div class="row">
 	<div class="col-lg-6">
 		<div class="panel panel-default" style="text-align: center;">
 			<img src="img/saram.png" style="width: 120px; height: 120px;">
 			<br>
 			<br>
 			Nombre
 			<div class="row" style="width: 100%;">
 				<i class="fa fa-user" style="font-size: 40px; float: left; width: 20%;"></i>
 				<input id="Nuser" class="form-control" type="text" name="Nombre" placeholder="Nombre" value="<?php echo e($Usuario->Nombre); ?>" style="width: 60%; height: 40px; font-size: 20px;">
 			</div>
 			Apellidos
 			<div class="row" style="width: 100%;">
 				<i class="fa fa-user" style="font-size: 40px; float: left; width: 20%;"></i>
 				<input id="Auser" class="form-control" type="text" name="Apellidos" placeholder="Apellidos" value="<?php echo e($Usuario->Apellidos); ?>" style="width: 60%; height: 40px; font-size: 20px;">
 			</div>
 			Fecha de nacimiento
 			<div class="row" style="width: 100%;">
 				<i class="fa fa-calendar" style="font-size: 40px; float: left; width: 20%;"></i>
 				<input id="DBuser" class="form-control" type="date" name="Nacimiento" placeholder="" value="<?php echo e($Usuario->Edad); ?>" style="width: 60%; height: 40px; font-size: 20px;">
 			</div>
 			Dirección
 			<div class="row" style="width: 100%;">
 				<i class="fa fa-map-marker" style="font-size: 40px; float: left; width: 20%;"></i>
 				<input id="Aduser" class="form-control" type="text" name="Direccion" placeholder="Dirección" value="<?php echo e($Usuario->Direccion); ?>" style="width: 60%; height: 40px; font-size: 20px;">
 			</div>
 			Teléfono
 			<div class="row" style="width: 100%;">
 				<i class="fa fa-phone" style="font-size: 40px; float: left; width: 20%;"></i>
 				<input id="Teluser" class="form-control" type="text" name="Telefono" placeholder="Teléfono" value="<?php echo e($Usuario->Telefono); ?>" style="width: 60%; height: 40px; font-size: 20px;">
 			</div>
 			Email
 			<div class="row" style="width: 100%;">
 				<i class="fa fa-envelope" style="font-size: 40px; float: left; width: 20%;"></i>
 				<input id="Mailuser" class="form-control" type="text" name="Correo" placeholder="Correo" value="<?php echo e($Usuario->Correo); ?>" style="width: 60%; height: 40px; font-size: 20px;">
 			</div>
 			<strong style="color: #F20505; font-size 24px;">Información adicional</strong><br>
 			Tipo de sangre
 			<div class="row" style="width: 100%;">
 				<i class="fa fa-tint" style="font-size: 40px; float: left; width: 20%;"></i>
 				<input id="blooduser" class="form-control" type="text" name="Sangre" placeholder="Tipo de Sangre" value="<?php echo e($Usuario->Tipo_sangre); ?>" style="width: 60%; height: 40px; font-size: 20px;">
 			</div>
 			Alergias
 			<div class="row" style="width: 100%;">
 				<i class="fa fa-thumbs-down" style="font-size: 40px; float: left; width: 20%;"></i>
 				<input id="alergiauser" class="form-control" type="text" name="Alergias" placeholder="Alergias" value="<?php echo e($Usuario->Alergias); ?>" style="width: 60%; height: 40px; font-size: 20px;">
 			</div>
 			Religión
 			<div class="row" style="width: 100%;">
 				<i class="fa fa-renren" style="font-size: 40px; float: left; width: 20%;"></i>
 				<input id="religionuser" class="form-control" type="text" name="Religion" placeholder="Religión" value="<?php echo e($Usuario->Religion); ?>" style="width: 60%; height: 40px; font-size: 20px;">
 			</div>
 			Extras
 			<div class="row" style="width: 100%;">
 				<i class="fa fa-plus" style="font-size: 40px; float: left; width: 20%;"></i>
 				<input id="extrauser" class="form-control" type="text" name="Extra" placeholder="Extras" value="<?php echo e($Usuario->Informacion_adicional); ?>" style="width: 60%; height: 40px; font-size: 20px;">
 			</div>
 			<br>
 			<br>
 			<button  onclick="updateperfil($('#Nuser').val(), $('#Auser').val(), $('#DBuser').val(), $('#Aduser').val(), $('#Teluser').val(), $('#Mailuser').val(), $('#blooduser').val(), $('#alergiauser').val(), $('#religionuser').val(), $('#extrauser').val(), '<?php echo e($Usuario->ID_usuario); ?>')" class="btn btn-success">Guardar</button>
 			<br><br>
 		</div>
 	</div>
 	<div class="col-lg-6" style="text-align: center;">
 		<h1>Con esté codigo QR podras iniciar sesión en la aplicación SARAM.</h1> 	<div id="QRCode" style="margin-top: 50px;">
 			
 		</div>	
 	</div>
 </div>
 <script type="text/javascript">
 	function makerQR(){
 		$.ajax({
                    type:'GET',
                    url: '/api/qrcode',
                    headers: {
                    	Authorization:'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsIkNvcnJlbyI6ImdjY2ExOTk4QGdtYWlsLmNvbSIsIk5vbWJyZSI6IkNhcmxvcyBBbGJlcnRvIiwiQXBlbGxpZG9zIjoiR2lsIENhbHZpbGxvIiwiaWF0IjoxNTk0OTI5OTU0LCJleHAiOjE1OTU1MzQ3NTR9.GHmj0TkspMhvpxgT2m0-PpdM09hcdgr68AWTC0KmV5M'
                    },
                    success : function(json){
                    	$('#QRCode').html(json);
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
 	}
 	makerQR();
 </script><?php /**PATH /var/www/saram.com/resources/views/Cpanel/perfil.blade.php ENDPATH**/ ?>