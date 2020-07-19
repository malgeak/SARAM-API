<div class="row"  style=" width: 100%; padding: 15px; padding-left: 0; padding-right: 0;">
	<div class="col-xl-12 col-lg-12 col-md-12 d-none d-md-block d-lg-block" style=" height: 30px;"></div>
	<div class="col-xl-3 col-lg-2 col-md-2 col-sm-2 d-none d-md-block d-sm-block"></div>
	<div class=" col-xl-7 col-lg-9 col-md-10 col-sm-10 d-none d-md-block d-sm-block bg-white rounded" style="text-align: center; padding: 0">
		<p style="font-weight: bold;">¿Nuevo Usuario? Registrate</p>
		<form id="registro">
			<div class="row" style="width: 95%;">
			<label class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="font-size: 2vw;"><i class="fas fa-user"></i></label>
			<input id="Nombre" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 form-control" type="text" name="nombre" placeholder="Nombre(s)" >
			</div>
			<div class="row" style="width: 95%;">
			<label class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="font-size: 2vw;"><i class="fas fa-user"></i></label>
			<input id="Apellidos" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 form-control" type="text" name="apellido" placeholder="Apellidos" >
			</div>
			<div class="row" style="width: 95%;">
			<label class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="font-size: 2vw;"><i class="fas fa-at"></i></label>
			<input id="Correo" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 form-control" type="email" name="email" placeholder="Correo Electrónico" >
			</div>
			<div class="row" style="width: 95%;"  >
			<label class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="font-size: 2vw;" ><i class="fas fa-lock"></i></label>
			<input id="contrasena" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 form-control" type="password" name="contrasena" placeholder="Contraseña" >
			</div>
			<div class="row" style="width: 95%;"  >
			<label class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="font-size: 2vw;" ><i class="fas fa-lock"></i></label>
			<input id="confirma" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 form-control" type="password" name="confirmacion" placeholder="Repetir Contraseña" >
			</div>
		<div style=" width: 95%; text-align: center; margin-top: 15px;">
			<a href="/privacidad">Ver términos y condiciones</a>
		</div>
		<div style=" width: 95%; text-align: center;">
			<input id="AceptoTerminos" class="" type="checkbox" name="terminos" id="terminos">
			<label for="terminos">Acepto términos y condiciones</label>
		</div>
		<button class="btn btn-primary" form="login" type="submit" style="width: 50%; margin-top: 1vw;" onclick="singup($('#Nombre').val(), $('#Apellidos').val(), $('#Correo').val(), $('#contrasena').val(), $('#confirma').val())">Registrarse</button>
		<button class="btn btn-secondary" type="button" onclick="ingresar()" style="width: 50%; margin-top: 2vw; font-weight: bold;">Ingresar</button>
		</form>
	</div>
</div><?php /**PATH /var/www/saram.com/resources/views/Contents/registro.blade.php ENDPATH**/ ?>