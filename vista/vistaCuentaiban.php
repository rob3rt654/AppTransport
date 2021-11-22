<?php 
include_once "Header.php";
include_once "Modals/ModalVehiculo.php";
?>

  


<div class="container pt-3  ">
    <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h1 class="text-center">Mi cuenta iban</h1>.
                    
            </div>
    </div>
    <div class="row">
            <div class="col-12 d-flex justify-content-center">
            <form action="../negocio/AccionVehiculo.php" method="POST">
            <input type="hidden" class="form-control" id="accion" name="accion"  value="cuenta">
                    <input type="text" name="cuentaiban" class="form-control" value="<?php echo $vendedor['0']['cuenta_iban']; ?>">
                    <button type="submit" class="btn btn-primary mt-3">Guardar Cuenta iban</button>
                    
                  
                </form>
                    
            </div>
    </div>

</div>


</div>
<?php 
//include_once "Footer.php";
?>

