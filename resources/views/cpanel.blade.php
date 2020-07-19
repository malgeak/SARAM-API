<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SARAM-CPanel </title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation" style="box-shadow: 1px 3px #888888;">
            <div class="navbar-header">
                <button class="btn hidden-lg hidden-sm" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse" style="float: right; width: 60px; height: 60px;">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <a class="navbar-brand" href="cpanel">
                    <img src="img/saram.png" alt="logotipo" style="width: 40px; height: 40px;">
                    <img src="img/name.png" alt="SARAM" style="width: 90px; ">
                </a>
            </div>

            <ul class="nav navbar-top-links navbar-right" >
                <li id="Username"></li>
                <li class="dropdown" style="">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user" >
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Soporte SARAM
                        <li><a href="#"><i class="fa fa-question-circle"></i> Ayuda</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#" onclick="exit();"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default  navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a id="btn_inicio" class="active-menu" href="#" onclick="inicio();"><i class="fa fa-home"></i> Inicio</a>
                    </li>
                    
                    <li>
                        <a id="btn_perfil" href="#" onclick="perfil();"><i class="fa fa-edit"></i> Perfil</a>
                    </li>
                    <li>
                        <a id="btn_contactos" href="#" onclick="contactos();"><i class="fa fa-group"></i> Contactos</a>
                    </li>
                    <li>
                        <a id="btn_informacion" onclick="informacion()" href="#"><i class="fa fa-files-o"></i> Información</a>
                    </li>
                    <li>
                        <a id="btn_privacidad" href="#" onclick="privacidad();"><i class="fa fa-shield" aria-hidden="true"></i> Politicas de privacidad</a>
                    </li>
                    <li>
                        <a href="tab-panel.html"><i class="fa fa-map-marker"></i> Ubicación</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="background: #FFFFFF;"> 
            <div id="page-inner" style="background: #FFFFFF;"> 
                <!--Aquí es donde se insertará el contenido de cada sección-->

               
               
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->

     </div>
<div id="Notificaciones" class="modal fade " style="top: 20%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             <a class="close" data-dismiss="modal" data-target=".Notificaciones" onclick="$('.modal-backdrop').remove();">×</a>
            </div>
         <div class="modal-body">
             <h1 id="Alerta_Status"></h1>
             <p id="Alerta_Mensaje"></p>
         <div class="modal-footer">
             <a href="#" class="btn btn-danger" data-dismiss="modal" data-target=".Notificaciones" onclick="$('.modal-backdrop').remove();">Cerrar</a>
         </div>
        </div>
    </div>
</div>
</div>

    
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
    <script src="js/functions.js"></script>


</body>

</html>
<script type="text/javascript">
    $("#Username").html(localStorage.getItem("Nombre"));
</script>