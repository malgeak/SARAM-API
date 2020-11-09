function inicio(){
	if("Token" in localStorage){
	    Token=localStorage.getItem("Token");
	    $.ajax({
                    type:'GET',
                    data: {
                    	token: Token
                    },
                    url: '/api/main',
                    success : function(json){
                    	$('#Content').html(json);
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
	}else{
		$.ajax({
                    type:'GET',
                    url: '/api/main',
                    success : function(json){
                    	$('#Content').html(json);
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
	}
	
}
function bot(){
	if("Token" in localStorage){
	    Token=localStorage.getItem("Token");
	    $.ajax({
                    type:'GET',
                    data: {
                    	token: Token
                    },
                    url: '/api/bot',
                    success : function(json){
                    	$('#Content').html(json);
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
	}else{
		$.ajax({
                    type:'GET',
                    url: '/api/bot',
                    success : function(json){
                    	$('#Content').html(json);
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
	}
	
}

function servicio(){
	$.ajax({
                    type:'GET',
                    url: '/api/servicio',
                    success : function(json){
                    	$('#Content').html(json);
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
}

function galeria(){
	$.ajax({
                    type:'GET',
                    url: '/api/galeria',
                    success : function(json){
                    	$('#Content').html(json);
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
}

function contacto(){
	$.ajax({
                    type:'GET',
                    url: '/api/contacto',
                    success : function(json){
                    	$('#Content').html(json);
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
}


function acerca(){
	$.ajax({
                    type:'GET',
                    url: '/api/acerca',
                    success : function(json){
                    	$('#Content').html(json);
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
}

function ingresar(){
	$.ajax({
                    type:'GET',
                    url: '/login',
                    success : function(json){
                    	$('#main_container').html(json);
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
}
function registro(){
	$.ajax({
                    type:'GET',
                    url: '/registro',
                    success : function(json){
                    	$('#main_container').html(json);
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
}

//Funciones en menu
function login(Cor, pwd){
	$.ajax({
                    type:'POST',
                    data: {
                    	Correo: Cor,
                    	Contrasena: pwd
                    },
                    url: '/api/login',
                    success : function(json){
                    	resultado = JSON.parse(json);
                    	if(resultado.status){
                    		localStorage.setItem("Token", resultado.Token);
                    		localStorage.setItem("Nombre", resultado.Nombre);
                    		window.location = "/cpanel";
                    	}else{
                    		$('#Alerta_Status').html('Error');
                    		$('#Alerta_Mensaje').html("Correo o contraseña incorrectas, por favor verifique sus datos.");
                    		$('#Notificaciones').modal('show');
                    	}
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
}

function singup (No, Ap, Co, pwd, con){
	if($('#AceptoTerminos').prop('checked')){
		if(pwd==con){
			$.ajax({
                    type:'POST',
                    data: {
                    	Nombre: No,
                    	Apellidos: Ap,
                    	Correo: Co,
                    	Contrasena: pwd,
                    	Confirmacion: con
                    },
                    url: '/api/registerUser',
                    success : function(json){
                    	resultado = JSON.parse(json);
                    	if(resultado.status){
                    		$('#Alerta_Status').html('Exito');
                    		$('#Alerta_Mensaje').html("Usuario registrado exitosamente");
                    		$('#Notificaciones').modal('show');
                    		ingresar();
                    	}else{
                
                    		if (resultado.errores) {
                    			if (resultado.errores.nombre) {
                    				$('#Alerta_Status').html('Error');
                    				$('#Alerta_Mensaje').html("Nombre invalido, solo se admiten letras");
                    				$('#Notificaciones').modal('show');
                    			}
                    			if (resultado.errores.apellidos) {
                    				$('#Alerta_Status').html('Error');
                    				$('#Alerta_Mensaje').html("Apellidos invalidos, solo se admiten letras");
                    				$('#Notificaciones').modal('show');
                    			}
                    			if (resultado.errores.correo) {
                    				$('#Alerta_Status').html('Error');
                    				$('#Alerta_Mensaje').html("Correo invalido");
                    				$('#Notificaciones').modal('show');
                    			}
                    		}else{
                    		$('#Alerta_Status').html('Error');
                    		$('#Alerta_Mensaje').html(resultado.mensaje);
                    		$('#Notificaciones').modal('show');
                    		}
                    		
                    	}
                    },
                    error: function(json){
                    	console.log(json);
                    }
                });
		}else{
			$('#Alerta_Status').html('Error');
			$('#Alerta_Mensaje').html("Las contraseñas no coinciden");
            $('#Notificaciones').modal('show');
		}
	}else{
		$('#Alerta_Status').html('Error');
		$('#Alerta_Mensaje').html("Es necesario que acepte los terminos");
		$('#Notificaciones').modal('show');
	}
}

function enviar(nom, cor, tel, men){
     $.ajax({
                    type:'POST',
                    data: {
                         Nombre:nom,
                         Correo: cor,
                         Telefono: tel,
                         Mensaje:men
                    },
                    url: '/api/correo',
                    success : function(json){
                         resultado = JSON.parse(json);
                         console.log(resultado);
                         if (resultado.status) {
                         $('#Alerta_Status').html('Exito');
                         $('#Alerta_Mensaje').html(resultado.Mensaje);
                         $('#Notificaciones').modal('show');
                         }else{
                              $('#Alerta_Status').html('Error');
                         $('#Alerta_Mensaje').html(resultado.Mensaje);
                         $('#Notificaciones').modal('show');
                         }
                    },
                    error: function(json){
                         console.log(json);
                    }
                });
}
inicio();