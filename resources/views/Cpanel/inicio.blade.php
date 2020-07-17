<div class="row " style="background: #FFFFFF; width: 100%; text-align: center;">
@if($resultado['status']==1)
	<h1 style="font-weight: bold;">Bienvenido</h1>
	<h2 style="font-weight: bold;">{{$resultado['Nombre']}}</h2>
	@if($resultado['Estado']==1)
		<i class="fa fa-exclamation-triangle" style="color: yellow; font-size: 250px; margin-top: 30px;"></i>
		<p>¡Vaya, no encontramos un registro de estado, por favor, verifica los dispositivos!</p>
	@endif
	@if($resultado['Estado']==2)
		<i class="fa fa-check-circle" style="color: green; font-size: 250px; margin-top: 30px;"></i>
		<p style="font-size: 20px;">Excelente</p>
	@endif
	@if($resultado['Estado']==3)
		<i class="fa fa-times-circle" style="color: red; font-size: 250px; margin-top: 30px;"></i>
		<p style="font-size: 20px;">¡Caida, Verifica el estado físico de la motocicleta!</p>
	@endif
@endif
</div>