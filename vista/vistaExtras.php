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
        Extras
    </title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../datatable/bootstrap.min.css">
    <link rel="stylesheet" href="../datatable/responsive.min.css">
    <link rel="stylesheet" href="../css/modalConfirmacion.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="../css/plantilla.css">
    <link rel="stylesheet" href="../css/gestiones.css">

    <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <script src="../js/bootstrap/popper.min.js"></script>

    <script src="../js/extras.js" type="text/javascript"></script>
    <script src="../datatable/datatable.min.js" type="text/javascript"></script>

    <script src="../datatable/bootstrap.min.js" type="text/javascript"></script>

    <script src="../datatable/responsive.min.js" type="text/javascript"></script>

    <script src="../datatable/responsivebootstrap.min.js" type="text/javascript"></script>

</head>

<body onload="consultar()">
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
                            <span>Cerrar Sesión</span>
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
                    <li class="nav-item">
                        <a class="nav-link" href="vistaPrincipal.php">
                            <i class="fas fa-home text-primary"></i> Principal

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vistaVehiculos.php">
                            <i class="fas fa-bus text-blue"></i>Vehiculos
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" href="vistaExtras.php">
                            <i class="fas fa-cogs text-orange"></i> Extras
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
        <div class="header bg-gradient-custom pb-8 pt-5 pt-md-4">
            <div class="container-fluid">


            </div>
        </div>
        <div class="container-fluid mt-4">

            <div class="tabla-principal">

                <div class="card-header border-0 ">
                    <h2>LISTA DE EXTRAS</h2>
                    <div class="text-right">
                        <button onclick="abrir()" class="btn btn-sm btn-custom">Agregar</button>
                    </div>


                </div>
                <table class="display table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="tbExtras">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tdatos">



                    </tbody>
                </table>

            </div>

        </div>

        <div id="modalExtras" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registro de Extras</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span onclick="cerrar()" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input type="text" class="form-control input" id="nombre" placeholder="Nombre" pattern="[A-Za-z0-9\s]+" required>

                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">

                                <button id="btnAgregar" type="button" onclick="agregar()" class="btn btn-primary">Guardar Cambios</button>
                                <button id="btnActualizar" type="button" onclick="abrirModal()" class="btn btn-primary">Actualizar</button>
                                <input class="btn btn-primary" type="reset" value="Limpiar">

                            </div>

                        </form>


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

        <div id="modalConfirmacion" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box" style="background:#053f5e">
                            <i class="material-icons">error</i>
                        </div>

                    </div>
                    <div class="modal-body">
                        <p class="text-center" id="textoModalE">¿Está seguro que desea actualizar los datos?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-block" data-dismiss="modal">Cancelar</button>
                        <button onclick="actualizar()" class="btn btn-primary btn-block">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="modalEliminar" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box1">
                            <i class="material-icons">&#xE5CD;</i>
                        </div>

                    </div>
                    <div class="modal-body">
                        <p class="text-center" id="textoModal">Seguro que desea eliminar?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="extraEliminar">
                        <button onclick="cerrar()" type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button onclick="eliminar()" type="button" class="btn btn-danger">Eliminar</button>

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