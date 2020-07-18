 <div class="row">
 	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" data-toggle="modal" data-target=".addMoto" style="margin-top: 50px; position: relative; max-width:450px;">
 		<div class="panel panel-default" style="width: 100%; height: 45vw; max-height: 230px; background: #b2b2b2b2">
 			<div style="width: 100%; height: 100%; position: relative; padding: 10px;">
 				<i class="fa fa-plus-circle" style="font-size: 100px; position: absolute; left: 39%; right: 39%; bottom: 25%;"></i>
 			</div>
 		</div>
 	</div>
 	@foreach($Motos as $Moto)
 	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" data-toggle="modal" data-target=".{{$Moto->ID_Motocicleta}}" style="margin-top: 50px; position: relative; max-width:450px;">
 		<div class="panel panel-default" style="width: 100%; height: 45vw; max-height: 230px; padding: 10px; border: 1px solid gold;">
 			<div style="width: 40%; height: 100%; position: relative; float: left;">
 			<img src="img/saram.png" style="width: 100%; bottom: 25%; position: absolute; left: 0%; right: 0%;">
 			</div>
 			<div style="width: 60%; height: 100%; position: relative; float: left; padding-top: 0;">
 				<p style="font-size: 18px; position: absolute;  padding: 1.5vw;"><strong>Modelo:</strong>{{$Moto->Modelo}}<br><strong>
 				Cilindraje:</strong>{{$Moto->Cilindraje}}<br>
 				<strong>Marca:</strong>{{$Moto->Marca}}<br>
 				<strong>Placa:</strong>{{$Moto->Placa}}<br>
 				<strong>SARAM:</strong>{{$Moto->ID_saram}}</p>
 				<p style="font-size: 18px;"></p>
 				<p style="font-size: 18px;"><strong></p>
 			</div>
 		</div>
 	</div>
 	@endforeach
 
@foreach($Motos as $Moto)
<div class="modal {{$Moto->ID_Motocicleta}} fade ">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             <a class="close" data-dismiss="modal" data-target=".{{$Moto->ID_Motocicleta}}">×</a>
         	</div>
         <div class="modal-body">
             <p>Para actualizar la información, por favor da clic en guardar.</p>
             Modelo
			<div class="row" style="text-align: center;">
				<div style="width: 7%; height: 20px; float: left;"></div>
				<input id="{{$Moto->ID_Motocicleta}}Mo" class="form-control" type="text" style="width: 90%; float: left; font-size: 25px; margin-top: 13px; text-align: center;" name="Modelo" value="{{$Moto->Modelo}}" placeholder="ej: GSXF">
			</div>
			Marca
			<div class="row" style="text-align: center;">
				<div style="width: 7%; height: 20px; float: left;"></div>
				<input id="{{$Moto->ID_Motocicleta}}Ma" class="form-control" type="text" style="width: 90%; float: left; font-size: 25px; margin-top: 13px; text-align: center;" name="Marca" value="{{$Moto->Marca}}" placeholder="ej: Italika">
			</div>
			Cilindraje			
			<div class="row" style="text-align: center;">
				<div style="width: 7%; height: 20px; float: left;"></div>
				<input id="{{$Moto->ID_Motocicleta}}Ci" class="form-control"  type="text" style="width: 90%; text-align: center; float: left; font-size: 25px; margin-top: 13px;" name="Cilindraje" value="{{$Moto->Cilindraje}}" placeholder="ej: 150">
			</div>
			Placa			
			<div class="row" style="text-align: center;">
				<div style="width: 7%; height: 20px; float: left;"></div>
				<input id="{{$Moto->ID_Motocicleta}}Pla" class="form-control" type="text" style="width: 90%; float: left; font-size: 25px; margin-top: 13px; text-align: center;" name="Placa" value="{{$Moto->Placa}}" placeholder="ej: 691EL">
			</div>
			ID_SARAM			
			<div class="row" style="text-align: center;">
				<div style="width: 7%; height: 20px; float: left;"></div>
				<input id="{{$Moto->ID_Motocicleta}}ID" class="form-control" type="text" style="width: 90%; text-align: center; float: left; font-size: 25px; margin-top: 13px;" name="ID_saram" value="{{$Moto->ID_saram}}" placeholder="ej: XXXXXX">
			</div>
         </div>
         <div class="modal-footer">
             <a href="#" class="btn btn-success" onclick="updatemoto($('#{{$Moto->ID_Motocicleta}}Mo').val(), $('#{{$Moto->ID_Motocicleta}}Ci').val(), $('#{{$Moto->ID_Motocicleta}}Ma').val(), $('#{{$Moto->ID_Motocicleta}}Pla').val(),$('#{{$Moto->ID_Motocicleta}}ID').val(), '{{$Moto->ID_Motocicleta}}');">Guardar</a>
             <a href="#" class="btn btn-info" data-dismiss="modal" data-target=".{{$Moto->ID_Motocicleta}}">Cancelar</a>
             <a class="btn btn-danger" data-toggle="modal"
	 			data-target=".{{$Moto->ID_Motocicleta}}d"><i class="fa fa-trash-o" style="font-size: 18px; color: white; z-index: 3; border: none;" ></i></a>
         </div>
        </div>
    </div>
</div>
<div class="modal {{$Moto->ID_Motocicleta}}d fade " style="top: 20%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             <a class="close" data-dismiss="modal" data-target=".{{$Moto->ID_Motocicleta}}d">×</a>
         	</div>
         <div class="modal-body">
             <p>¿Esta seguro que desea eliminar está motocicleta?</p>
         <div class="modal-footer">
             <a href="#" class="btn btn-success" onclick="deletemoto('{{$Moto->ID_Motocicleta}}');">Si</a>
             <a href="#" class="btn btn-danger" data-dismiss="modal" data-target=".{{$Moto->ID_Motocicleta}}d">Cancelar</a>
         </div>
        </div>
    </div>
</div>
</div>
@endforeach

<div class="modal addMoto fade ">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             <a class="close" data-dismiss="modal" data-target=".addMoto">×</a>
         	</div>
         <div class="modal-body">
             <p>Para actualizar la información, por favor da clic en guardar.</p>
             Modelo
			<div class="row" style="text-align: center;">
				<div style="width: 7%; height: 20px; float: left;"></div>
				<input id="Mo" class="form-control" type="text" style="width: 90%; float: left; font-size: 25px; margin-top: 13px; text-align: center;" name="Modelo" value="" placeholder="ej: GSXF">
			</div>
			Marca
			<div class="row" style="text-align: center;">
				<div style="width: 7%; height: 20px; float: left;"></div>
				<input id="Ma" class="form-control" type="text" style="width: 90%; float: left; font-size: 25px; margin-top: 13px; text-align: center;" name="Marca" value="" placeholder="ej: Italika">
			</div>
			Cilindraje			
			<div class="row" style="text-align: center;">
				<div style="width: 7%; height: 20px; float: left;"></div>
				<input id="Ci" class="form-control"  type="text" style="width: 90%; text-align: center; float: left; font-size: 25px; margin-top: 13px;" name="Cilindraje" value="" placeholder="ej: 150">
			</div>
			Placa			
			<div class="row" style="text-align: center;">
				<div style="width: 7%; height: 20px; float: left;"></div>
				<input id="Pla" class="form-control" type="text" style="width: 90%; float: left; font-size: 25px; margin-top: 13px; text-align: center;" name="Placa" value="" placeholder="ej: 691EL">
			</div>
			ID_SARAM			
			<div class="row" style="text-align: center;">
				<div style="width: 7%; height: 20px; float: left;"></div>
				<input id="ID" class="form-control" type="text" style="width: 90%; text-align: center; float: left; font-size: 25px; margin-top: 13px;" name="ID_saram" value="" placeholder="ej: XXXXXX">
			</div>
         </div>
         <div class="modal-footer">
             <a href="#" class="btn btn-success" onclick="addmoto($('#Mo').val(), $('#Ci').val(), $('#Ma').val(), $('#Pla').val(),$('#ID').val());">Guardar</a>
             <a href="#" class="btn btn-info" data-dismiss="modal" data-target=".addMoto">Cancelar</a>
         </div>
        </div>
    </div>
</div>
 </div>