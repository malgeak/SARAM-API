/*Functions of cpanel system*/
function inicio(){
	$('#page-inner').empty();
	$('#btn_inicio').addClass('active-menu');
	$('#btn_contactos').removeClass('active-menu');
	$('#btn_privacidad').removeClass('active-menu');
	//Aqui agregar la función para obtención y envio de credenciales.
	$.ajax({
                    type:'GET',
                    url: '/api/inicio',
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
function contactos(){
	$('#page-inner').empty();
	$('#btn_contactos').addClass('active-menu');
	$('#btn_inicio').removeClass('active-menu');
	$('#btn_privacidad').removeClass('active-menu');
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

function privacidad(){
	$('#page-inner').empty();
	$('#btn_privacidad').addClass('active-menu');
	$('#btn_contactos').removeClass('active-menu');
	$('#btn_inicio').removeClass('active-menu');
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


inicio();