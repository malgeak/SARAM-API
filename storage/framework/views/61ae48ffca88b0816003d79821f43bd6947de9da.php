<div class="row">
	<div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-xs-12 row"  >
		<div class="col-12" style="height: 200px;"></div>
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
			<h1 class="text-secondary col-xl-10 col-lg-10 col-md-10 col-sm-9 col-xs-9" style="font-size: 2.5vw; text-align: center;" >Si quieres saber mas información o 
			adquirir nuestro dispositivo de SARAM. ¡Contactanos!</h1>	
			<div class="col-xl-0 col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
			<span class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-xs-12  text-white" style="font-size: 2.5vw; text-align: center;"><i class="fas fa-phone"></i></span>
			<label class="col-xl-5 col-lg-4 col-md-4 col-sm-12 col-xs-12 text-white" style="font-size: 2.5vw; margin-top: 2px; text-align: center;">55-78-32-98-83</label>
			<span class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-xs-12 text-white" style="font-size: 2.5vw; text-align: center;"><i class="fas fa-envelope"></i></span>
			<label class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 text-white" style="font-size: 2.5vw; margin-top: 2px; text-align: center;">contacto@saram.com</label>
			<div class="col-xl-1 col-lg-1 "></div>
				<div class="col-12" style="height: 200px;"></div></div>
	<div class="col-xl-6 col-md-6 col-lg-6 d-none d-md-block d-lg-block" >
		<div class="row"  style=" width: 100%; padding-left: 0px; padding-right: 0px;">
			<div class="col-12" style=" height: 40px;"></div>
			<div class="col-xl-3 col-lg-2 col-md-2 col-sm-2 d-none d-md-block d-sm-block"></div>
			<div class=" col-xl-8 col-lg-8 col-md-10 col-sm-10 d-none d-md-block d-sm-block bg-white rounded" style="text-align: center; padding: 10px;">
				<p style="font-weight: bold;">Aquí puedes escribir tu mensaje</p>
				<form id="login">
					<div class="row" style="width: 95%; margin-top: 5vw"  >
					<label class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="font-size: 2vw;" for="correo"><i class="fas fa-user"></i></label>
					<input id="Nombre" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 form-control" type="Text" name="Nombre" placeholder="Nombre" >
					</div>
					<div class="row" style="width: 95%; margin-top: 0.8vw"  >
					<label class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="font-size: 2vw;" for="correo"><i class="fas fa-at"></i></label>
					<input id="email" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 form-control" type="email" name="correo" placeholder="Correo Electrónico" >
					</div>
					<div class="row" style="width: 95%; margin-top: 0.8vw"  >
					<label class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="font-size: 2vw;" for="Phone"><i class="fas fa-phone"></i></label>
					<input id="phone" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 form-control" type="phone" name="correo" placeholder="Telefono" >
					</div>
					<div class="row" style="width: 95%; margin-top: 2vw"  >
					<label class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="font-size: 2vw;" for="textarea"><i class="fas fa-envelope"></i></label>
					<textarea id="mensaje" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 "  type="text" name="mensaje" rows="4" cols="50" placeholder="Escribe aqui tu sugerencia, pregunta o recomendación. Nosotros la leéremos." style="color: black;" ></textarea>
					</div>
				</form>
			<div style=" width: 95%; text-align: right;">
			</div>
			<button class="btn btn-primary" form="login" type="button" onclick=" enviar($('#Nombre').val(),$('#email').val(), $('#phone').val, $('#mensaje').val());" style="width: 50%; margin-top: 3vw;">Enviar</button>
			<div class="col-xl-12 col-lg-12 col-md-12 d-none d-md-block d-sm-block" style="height: 20px;"></div>
		</div>
	</div>
</div><?php /**PATH /var/www/saram.com/resources/views/Contents/contacto.blade.php ENDPATH**/ ?>