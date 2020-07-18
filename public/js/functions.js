/*Functions of cpanel system*/
function inicio(){
	$('#page-inner').empty();
	$('#btn_inicio').addClass('active-menu');
	$('#btn_contactos').removeClass('active-menu');
     $('#btn_informacion').removeClass('active-menu');
	$('#btn_privacidad').removeClass('active-menu');
     $('#btn_perfil').removeClass('active-menu');
	//Aqui agregar la función para obtención y envio de credenciales.
	$.ajax({
                    type:'GET',
                    url: '/api/inicio',
                    headers: {
                    	Authorization:'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsIkNvcnJlbyI6ImdjY2ExOTk4QGdtYWlsLmNvbSIsIk5vbWJyZSI6IkNhcmxvcyBBbGJlcnRvIiwiQXBlbGxpZG9zIjoiR2lsIENhbHZpbGxvIiwiaWF0IjoxNTk0OTI5OTU0LCJleHAiOjE1OTU1MzQ3NTR9.GHmj0TkspMhvpxgT2m0-PpdM09hcdgr68AWTC0KmV5M'
                    },
                    data : {
                         ID_motocicleta: localStorage.getItem("Moto")
                    },
                    success : function(json){
                    	$('#page-inner').html(json);
                         if("Moto" in localStorage){
                              $('#selectmoto').val(localStorage.getItem("Moto"));
                         }
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
}
function contactos(){
	$('#page-inner').empty();
	$('#btn_contactos').addClass('active-menu');
	$('#btn_inicio').removeClass('active-menu');
     $('#btn_informacion').removeClass('active-menu');
	$('#btn_privacidad').removeClass('active-menu');
     $('#btn_perfil').removeClass('active-menu');
	//Aqui agregar la función para obtención y envio de credenciales.
	$.ajax({
                    type:'GET',
                    url: '/api/contactos',
                    headers: {
                    	Authorization:'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsIkNvcnJlbyI6ImdjY2ExOTk4QGdtYWlsLmNvbSIsIk5vbWJyZSI6IkNhcmxvcyBBbGJlcnRvIiwiQXBlbGxpZG9zIjoiR2lsIENhbHZpbGxvIiwiaWF0IjoxNTk0OTI5OTU0LCJleHAiOjE1OTU1MzQ3NTR9.GHmj0TkspMhvpxgT2m0-PpdM09hcdgr68AWTC0KmV5M'
                    },
                    success : function(json){
                    	$('#page-inner').html(json);
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
}
function informacion(){
     $('#page-inner').empty();
     $('#btn_informacion').addClass('active-menu');
     $('#btn_inicio').removeClass('active-menu');
     $('#btn_contactos').removeClass('active-menu');
     $('#btn_privacidad').removeClass('active-menu');
     $('#btn_perfil').removeClass('active-menu');
     //Aqui agregar la función para obtención y envio de credenciales.
     $.ajax({
                    type:'GET',
                    url: '/api/informacion',
                    headers: {
                         Authorization:'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsIkNvcnJlbyI6ImdjY2ExOTk4QGdtYWlsLmNvbSIsIk5vbWJyZSI6IkNhcmxvcyBBbGJlcnRvIiwiQXBlbGxpZG9zIjoiR2lsIENhbHZpbGxvIiwiaWF0IjoxNTk0OTI5OTU0LCJleHAiOjE1OTU1MzQ3NTR9.GHmj0TkspMhvpxgT2m0-PpdM09hcdgr68AWTC0KmV5M'
                    },
                    success : function(json){
                         $('#page-inner').html(json);
                    },
                    error: function(json){
                         console.log(json);
                    }
                });
}

function privacidad(){
	$('#page-inner').empty();
	$('#btn_privacidad').addClass('active-menu');
	$('#btn_contactos').removeClass('active-menu');
     $('#btn_informacion').removeClass('active-menu');
	$('#btn_inicio').removeClass('active-menu');
     $('#btn_perfil').removeClass('active-menu');
	//Aqui agregar la función para obtención y envio de credenciales.
	$.ajax({
                    type:'GET',
                    url: '/privacidad',
                    success : function(json){
                    	$('#page-inner').html(json);
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
}
function perfil(){
     $('#page-inner').empty();
     $('#btn_perfil').addClass('active-menu');
     $('#btn_inicio').removeClass('active-menu');
     $('#btn_contactos').removeClass('active-menu');
     $('#btn_informacion').removeClass('active-menu');
     $('#btn_privacidad').removeClass('active-menu');
     //Aqui agregar la función para obtención y envio de credenciales.
     $.ajax({
                    type:'GET',
                    url: '/api/perfil',
                    headers: {
                         Authorization:'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsIkNvcnJlbyI6ImdjY2ExOTk4QGdtYWlsLmNvbSIsIk5vbWJyZSI6IkNhcmxvcyBBbGJlcnRvIiwiQXBlbGxpZG9zIjoiR2lsIENhbHZpbGxvIiwiaWF0IjoxNTk0OTI5OTU0LCJleHAiOjE1OTU1MzQ3NTR9.GHmj0TkspMhvpxgT2m0-PpdM09hcdgr68AWTC0KmV5M'
                    },
                    data : {
                         ID_motocicleta: localStorage.getItem("Moto")
                    },
                    success : function(json){
                         $('#page-inner').html(json);
                         if("Moto" in localStorage){
                              $('#selectmoto').val(localStorage.getItem("Moto"));
                         }
                    },
                    error: function(json){
                         console.log(json);
                    }
                });
}
//Funciones de Contactos
function newcontacto(name, Apellido, Celular, email){
$.ajax({
                    type:'POST',
                    url: '/api/setContactos',
                    headers: {
                    	Authorization:'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsIkNvcnJlbyI6ImdjY2ExOTk4QGdtYWlsLmNvbSIsIk5vbWJyZSI6IkNhcmxvcyBBbGJlcnRvIiwiQXBlbGxpZG9zIjoiR2lsIENhbHZpbGxvIiwiaWF0IjoxNTk0OTI5OTU0LCJleHAiOjE1OTU1MzQ3NTR9.GHmj0TkspMhvpxgT2m0-PpdM09hcdgr68AWTC0KmV5M'
                    },
                    data:{
                    	Nombre: name,
                    	Apellidos: Apellido,
                    	Numero_Tel: Celular,
                    	Correo: email
                    },
                    success : function(json){
                    	resultado=JSON.parse(json);

                    	if(resultado[0].status){
                    		$('.addcontact').modal('hide');
                    		$('#Alerta_Status').html('Exito');
                    		$('#Alerta_Mensaje').html(resultado[0].mensaje);
                    		$('#Notificaciones').modal('show');
                    		$('body').removeClass('modal-open');
                    		contactos();
                    	}else{
                    		$('#Alerta_Status').html('Error');
                    		$('#Alerta_Mensaje').html(resultado[0].mensaje);
                    		$('#Notificaciones').modal('show');
                    	}
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
}

function updatecontacto(name, Apellido, Celular, email){
$.ajax({
                    type:'POST',
                    url: '/api/updateContactos',
                    headers: {
                    	Authorization:'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsIkNvcnJlbyI6ImdjY2ExOTk4QGdtYWlsLmNvbSIsIk5vbWJyZSI6IkNhcmxvcyBBbGJlcnRvIiwiQXBlbGxpZG9zIjoiR2lsIENhbHZpbGxvIiwiaWF0IjoxNTk0OTI5OTU0LCJleHAiOjE1OTU1MzQ3NTR9.GHmj0TkspMhvpxgT2m0-PpdM09hcdgr68AWTC0KmV5M'
                    },
                    data:{
                    	Nombre: name,
                    	Apellidos: Apellido,
                    	Numero_Tel: Celular,
                    	Correo: email
                    },
                    success : function(json){
                    	resultado=JSON.parse(json);

                    	if(resultado[0].status){
                    		$('.addcontact').modal('hide');
                    		$('#Alerta_Status').html('Exito');
                    		$('#Alerta_Mensaje').html(resultado[0].mensaje);
                    		$('#Notificaciones').modal('show');
                    		$('body').removeClass('modal-open');
                    		contactos();
                    	}else{
                    		$('#Alerta_Status').html('Error');
                    		$('#Alerta_Mensaje').html(resultado[0].mensaje);
                    		$('#Notificaciones').modal('show');
                    	}
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
}

function deletecontacto(Celular, id){
$.ajax({
                    type:'POST',
                    url: '/api/delContactos',
                    headers: {
                    	Authorization:'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsIkNvcnJlbyI6ImdjY2ExOTk4QGdtYWlsLmNvbSIsIk5vbWJyZSI6IkNhcmxvcyBBbGJlcnRvIiwiQXBlbGxpZG9zIjoiR2lsIENhbHZpbGxvIiwiaWF0IjoxNTk0OTI5OTU0LCJleHAiOjE1OTU1MzQ3NTR9.GHmj0TkspMhvpxgT2m0-PpdM09hcdgr68AWTC0KmV5M'
                    },
                    data:{
                    	Numero_Tel: Celular
                    },
                    success : function(json){
                    	resultado=JSON.parse(json);

                    	if(resultado[0].status){
                    		$('.'+id).modal('hide');
                    		$('.'+id+'d').modal('hide');
                    		$('#Alerta_Status').html('Exito');
                    		$('#Alerta_Mensaje').html(resultado[0].mensaje);
                    		$('#Notificaciones').modal('show');
                    		$('body').removeClass('modal-open');
                    		contactos();
                    	}else{
                    		$('#Alerta_Status').html('Error');
                    		$('#Alerta_Mensaje').html(resultado[0].mensaje);
                    		$('#Notificaciones').modal('show');
                    	}
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
}

//Funciones de Información
function addmoto(Mod, Cil, Mar, Pla, ID_SARAM){
   $.ajax({
                    type:'POST',
                    url: '/api/addmoto',
                    headers: {
                         Authorization:'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsIkNvcnJlbyI6ImdjY2ExOTk4QGdtYWlsLmNvbSIsIk5vbWJyZSI6IkNhcmxvcyBBbGJlcnRvIiwiQXBlbGxpZG9zIjoiR2lsIENhbHZpbGxvIiwiaWF0IjoxNTk0OTI5OTU0LCJleHAiOjE1OTU1MzQ3NTR9.GHmj0TkspMhvpxgT2m0-PpdM09hcdgr68AWTC0KmV5M'
                    },
                    data:{
                         Modelo: Mod,
                         Marca: Mar,
                         Cilindraje: Cil,
                         Placa: Pla,
                         SARAM: ID_SARAM
                    },
                    success : function(json){
                         resultado=JSON.parse(json);
                         if(resultado.status){
                              $('.addmoto').modal('hide');
                              $('#Alerta_Status').html('Exito');
                              $('#Alerta_Mensaje').html(resultado.mensaje);
                              $('#Notificaciones').modal('show');
                              $('body').removeClass('modal-open');
                              informacion();
                         }else{
                              $('#Alerta_Status').html('Error');
                              $('#Alerta_Mensaje').html(resultado.mensaje);
                              $('#Notificaciones').modal('show');
                         }
                    },
                    error: function(json){
                         console.log(json);
                    }
                });  
}
function updatemoto(Mod, Cil, Mar, Pla, ID_SARAM, ID_moto){
   $.ajax({
                    type:'POST',
                    url: '/api/updatemoto',
                    headers: {
                         Authorization:'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsIkNvcnJlbyI6ImdjY2ExOTk4QGdtYWlsLmNvbSIsIk5vbWJyZSI6IkNhcmxvcyBBbGJlcnRvIiwiQXBlbGxpZG9zIjoiR2lsIENhbHZpbGxvIiwiaWF0IjoxNTk0OTI5OTU0LCJleHAiOjE1OTU1MzQ3NTR9.GHmj0TkspMhvpxgT2m0-PpdM09hcdgr68AWTC0KmV5M'
                    },
                    data:{
                         Modelo: Mod,
                         Marca: Mar,
                         Cilindraje: Cil,
                         Placa: Pla,
                         SARAM: ID_SARAM,
                         ID_Moto: ID_moto
                    },
                    success : function(json){
                         resultado=JSON.parse(json);
                         if(resultado.status){
                              $('.'+ID_moto).modal('hide');
                              $('#Alerta_Status').html('Exito');
                              $('#Alerta_Mensaje').html(resultado.mensaje);
                              $('#Notificaciones').modal('show');
                              $('body').removeClass('modal-open');
                              informacion();
                         }else{
                              $('#Alerta_Status').html('Error');
                              $('#Alerta_Mensaje').html(resultado.mensaje);
                              $('#Notificaciones').modal('show');
                         }
                    },
                    error: function(json){
                         console.log(json);
                    }
                });  
}
function deletemoto(ID_moto){
   $.ajax({
                    type:'POST',
                    url: '/api/deleteMoto',
                    headers: {
                         Authorization:'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsIkNvcnJlbyI6ImdjY2ExOTk4QGdtYWlsLmNvbSIsIk5vbWJyZSI6IkNhcmxvcyBBbGJlcnRvIiwiQXBlbGxpZG9zIjoiR2lsIENhbHZpbGxvIiwiaWF0IjoxNTk0OTI5OTU0LCJleHAiOjE1OTU1MzQ3NTR9.GHmj0TkspMhvpxgT2m0-PpdM09hcdgr68AWTC0KmV5M'
                    },
                    data:{

                         ID_Moto: ID_moto
                    },
                    success : function(json){
                         resultado=JSON.parse(json);

                         if(resultado.status){
                              $('.'+ID_moto).modal('hide');
                              $('#Alerta_Status').html('Exito');
                              $('#Alerta_Mensaje').html(resultado.mensaje);
                              $('#Notificaciones').modal('show');
                              $('body').removeClass('modal-open');
                              informacion();
                         }else{
                              $('#Alerta_Status').html('Error');
                              $('#Alerta_Mensaje').html(resultado.mensaje);
                              $('#Notificaciones').modal('show');
                         }
                    },
                    error: function(json){
                         console.log(json);
                    }
                });  
}

//Funciones de inicio
function setmot(id){
     localStorage.setItem("Moto", id);
}
function updateperfil(No, Ap, DB, Dir, Tel, Email, TS, Alergi, Religio, Extra, Id){
     $.ajax({
                    type:'POST',
                    url: '/api/updateUser',
                    headers: {
                         Authorization:'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsIkNvcnJlbyI6ImdjY2ExOTk4QGdtYWlsLmNvbSIsIk5vbWJyZSI6IkNhcmxvcyBBbGJlcnRvIiwiQXBlbGxpZG9zIjoiR2lsIENhbHZpbGxvIiwiaWF0IjoxNTk0OTI5OTU0LCJleHAiOjE1OTU1MzQ3NTR9.GHmj0TkspMhvpxgT2m0-PpdM09hcdgr68AWTC0KmV5M'
                    },
                    data:{
                         Nombre: No,
                         Apellidos: Ap,
                         Correo: Email,
                         Edad: DB,
                         Telefono: Tel,
                         Direccion: Dir,
                         Tipo_Sangre: TS,
                         Alergias: Alergi,
                         Religion:Religio,
                         Extras: Extra
                    },
                    success : function(json){
                         resultado=JSON.parse(json);
                         if(resultado.status){
                              $('.addcontact').modal('hide');
                              $('#Alerta_Status').html('Exito');
                              $('#Alerta_Mensaje').html(resultado.mensaje);
                              $('#Notificaciones').modal('show');
                              $('body').removeClass('modal-open');
                              perfil();
                         }else{
                              $('#Alerta_Status').html('Error');
                              $('#Alerta_Mensaje').html(resultado.mensaje);
                              $('#Notificaciones').modal('show');
                         }
                    },
                    error: function(json){
                         console.log(json);
                    }
                });
}

inicio();

function checkEdo(){
     //Aqui agregar la función para obtención y envio de credenciales.
     $.ajax({
                    type:'POST',
                    url: '/api/getEstado',
                    headers: {
                         Authorization:'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsIkNvcnJlbyI6ImdjY2ExOTk4QGdtYWlsLmNvbSIsIk5vbWJyZSI6IkNhcmxvcyBBbGJlcnRvIiwiQXBlbGxpZG9zIjoiR2lsIENhbHZpbGxvIiwiaWF0IjoxNTk0OTI5OTU0LCJleHAiOjE1OTU1MzQ3NTR9.GHmj0TkspMhvpxgT2m0-PpdM09hcdgr68AWTC0KmV5M'
                    },
                    data : {
                         ID_motocicleta: localStorage.getItem("Moto")
                    },
                    success : function(json){
                         resultado=JSON.parse(json);
                         if(resultado.Estado==3){
                              inicio();
                         }
                    },
                    error: function(json){
                         console.log(json);
                    }
                });
}

setInterval('checkEdo()', 3000);