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
		<p>Hola {{$Nombre}}, necesita ponerse en contacto. Su petición es:<br>
			{{$Mensaje}} <br>
		 porfavor, contactalo en el menor tiempo posible, nuestra prioridad es ofrecer el mejor servicio, estos son sus contactos.
		 @if(isset($Telefono))
		 Telefono: {{$Telefono}}
		 @endif
		 <br>
		 @if(isset($Correo))
		 Correo: {{$Correo}}
		 @endif
		</p>
	</div>
</body>
</html>