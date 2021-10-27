<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Registro Smart Transport
  </title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">


  <!-- CSS Files -->
  <link rel="stylesheet" href="../css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="../css/plantilla.css">

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
  <script src="../js/bootstrap/bootstrap.min.js"></script>
  <script src="../js/bootstrap/popper.min.js"></script>

  <script src="../js/registro.js"></script>

</head>

<body class="bg-default">
  <div class="main-content">

    <!-- Header -->
    <div class="header bg-gradient-custom py-7 py-lg-8">

      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    
    <div class="container mt--7 pb-5">


      
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-transparent pb-5">

              <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                  <div class="card-profile-image">
                    <a href="#">
                      <img src="../imagenes/img.jpeg" class="rounded-circle">
                    </a>
                  </div>
                </div>
              </div>

            </div>
            <div class="card-body mt-6 px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Digite sus credenciales</small>
              </div>
              <form role="form" id="formregistroUsuario">
                  
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-signature"></i></span>
                    </div>
                    <input id="name" class="form-control" placeholder="Nombre" type="text" name="name">
                  </div>
                </div>

                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-signature"></i></span>
                    </div>
                    <input id="apellido" class="form-control" placeholder="Apellido" type="text" name="apellido">
                  </div>
                </div>

                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-clock"></i></span>
                    </div>
                    <input id="date" name="date" class="form-control" placeholder="Fecha de nacimiento" type="date">
                  </div>
                </div>

                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                    </div>
                    <input id="phone" name="phone" class="form-control" placeholder="Teléfono" type="number">
                  </div>
                </div>

                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                  <label class="input-group-text" for="inputGroupSelect01">Tipo de usuario</label>
                  <select class="form-select" id="tipoUsuario" name="tipoUsuario">
                    <option value="1" id="1" selected>Chofer</option>
                    <option value="2" id="2">Consumidor</option>
                 </select>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input id="email" class="form-control" placeholder="Email" type="email" name="email">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input id="password" class="form-control" placeholder="Password" type="password" name="password">
                  </div>
                </div>

                <div class="text-center">
                  <button type="button" onclick="registrar()" id="btnregistro" name="btnregistro" class="btn btn-custom my-4">Registrar</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>

</body>

</html>