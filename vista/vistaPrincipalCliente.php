<?php
session_start();
if ($_SESSION['id'] == "" || $_SESSION['id'] == null) {
    header('Location: ../index.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Principal Smart Transport
    </title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../css/plantilla.css">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvqnZpS3wSkso426z5wlgxmT1R69q6NXM&libraries=places&callback=initMap"></script>
    <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <script src="../js/bootstrap/popper.min.js"></script>

    <script src="../js/principal_cliente.js"></script>
    <script src="../js/cerrar_sesion.js"></script>
    <style>
        .modal{
            z-index: 20;   
        }
        .modal-backdrop{
            z-index: 10;        
        }​
        .pac-container {
            background-color: #FFF;
            z-index: 20;
            position: fixed;
            display: inline-block;
            float: left;
        }
    </style>
        
    
</head>

<body onload="llenarCartas()">
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand pt-0" href="#">
                <img src="../imagenes/img.jpeg" class="navbar-brand-img" alt="...">
            </a>
            <!-- User -->
            <ul class="nav align-items-center d-md-none">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-bell-55"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Bienvenido!</h6>
                        </div>

                       

                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-sign-out-alt"></i>
                            <span onclick="cerrarSesion()">Cerrar Sesión</span>
                        </a>
                    </div>
                </li>
            </ul>

            <div class="collapse navbar-collapse" id="sidenav-collapse-main">

                <div class="navbar-collapse-header d-md-none">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="vistaPrincipal.php">
                                <img src="../imagenes/img.jpeg">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item  active ">
                        <a class="nav-link  active " href="vistaPrincipalCliente.php">
                            <i class="fas fa-home text-primary"></i> Buscar Servicios

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="vistaSolicitudesCliente.php">
                            <i class="fas fa-bus text-blue"></i>Mis solicitudes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="vistaPagos.php">
                            <i class="fas fa-dollar-sign text-orange"></i> Mis pagos
                        </a>
                    </li>
        
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading text-muted"></h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">

                </ul>
            </div>
        </div>
    </nav>
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">Smart Transport</a>
                <!-- Form -->

                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <i class="fas fa-user"></i>
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['nombre']; ?></span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Bienvenido!</h6>
                            </div>

                          

                            <div class="dropdown-divider"></div>
                            <button onclick="cerrarSesion()" class="dropdown-item">

                                <i class="fas fa-sign-out-alt"></i>
                                <span>Cerrar Sesión</span>

                            </button>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
        <!-- Header -->
        <div class="header bg-gradient-custom pb-8 pt-5 pt-md-8">
            <div class="container-fluid">
                <div id="cartas" class="header-body">
                    <!-- Card stats -->

                </div>
            </div>
        </div>
        <div class="container-fluid mt--7">
            
        <div id="modalSolicitud" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Solicitar Servicio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span onclick="cerrar()" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <input type="hidden" name="id_servicio" id="id_servicio">
                            <div class="pl-lg-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-fecha-inicio">Fecha de Inicio</label>
                                                <input type="date" class="form-control input" id="fecha_inicio" placeholder="Fecha de Inicio" required>

                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-fecha-final">Fecha Final</label>
                                                <input type="date" class="form-control input" id="fecha_final" placeholder="Fecha Final" required>

                                            </div>
                                        </div>

                                    </div>

                                    <hr class="my-4" />
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="cantidad_personas">Cantidad de Personas</label>
                                                <input type="input" class="form-control input" id="cantidad_personas" placeholder="Cantidad Personas" required>

                                            </div>
                                        </div>

                                    </div>

                                    <hr class="my-4" />
                                    <h6 class="heading-small text-muted mb-4">Mapa</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-address">Origen</label>
                                                    <input type="text" class="form-control input" id="searchInput" placeholder="Origen" required>
                                                    <input type="hidden" class="form-control input" id="nombrelugar1" placeholder="Origen" required>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-address">Destino</label>
                                                    <input type="text" class="form-control input" id="searchInput2" placeholder="Destino" required>
                                                    <input type="hidden" class="form-control input" id="nombrelugar2" placeholder="Origen" required>


                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-duracion">Duración Promedio</label>
                                                    <input type="text" class="form-control input" id="duracion" placeholder="Duración Promedio" required readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-distancia">Distancia</label>
                                                    <input type="text" class="form-control input" id="distancia" placeholder="Distancia" required readonly>

                                                </div>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="map" style="width: 530px; height: 300px;">

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <hr class="my-4" />
                                    <div class="pl-lg-4">
                                        <div class="row justify-content-end">
                                            <div class="col-md-3">
                                                <div class="form-group">

                                                    <button id="btnAgregar" onclick="solicitarServicio()" type="button" class="btn btn-primary">Solicitar Servicio</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                        </form>


                    </div>
                </div>
            </div>
        </div>

        


        </div>

        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="material-icons">&#xE876;</i>
                        </div>

                    </div>
                    <div class="modal-body">
                        <p class="text-center" id="textoModal"></p>
                    </div>
                    <div class="modal-footer">
                        <button onclick="cerrar()" class="btn btn-success btn-block">OK</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer">

            <footer class="footer-basic-centered">

                <div class="footer-company-name">
                    <h1>Universidad Nacional de Costa Rica</h1>
                    <p>Smart Transport</p>

                </div>

                <p class="footer-company-name"> &copy; 2020</p>

            </footer>
        </div>
    </div>

</body>

</html>