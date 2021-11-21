<?php 
include_once "Header.php";
include_once "Modals/ModalVehiculo.php";
?>

    <div class="container-fluid mt-3">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Nuevo Vehiculo</button>



<div class="container pt-3 ">
<div class="row">
    <?php foreach ($vehiculos as $key => $value) :?>
    <div class="col-4">
        <div class="card " style="width: 18rem;">
        
            <img class="card-img-top" src="../imagenes/<?php echo $value['imagenes'] ?>" alt="Card image cap">
            
            <div class="card-body">
            <h3 class="card-title">Vehiculo <?php echo $value['placa'] ?></h3>
            <form action="AccionVehiculo.php" method="POST">
            <input type="hidden" class="form-control" id="accion" name="accion"  value="editar">
            <input type="hidden" class="form-control" id="id" name="id"  value="<?php echo $value['id_vehiculo'] ?>">
                <label class="card-text" for="">Color:</label>
                <input type="text" id="color" name="color" class="form-control" value="<?php echo $value['color'] ?>">
                <label  for="">Capacidad Peso:</label>
                <input type="text" id="peso" name="peso" class="form-control" value="<?php echo $value['capacidad_peso'] ?>">
                <label  for="">Capacidad personas:</label>
                <input type="text" id="personas" name="personas" class="form-control" value="<?php echo $value['capacidad_personas'] ?>">
                
                <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                
                
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
</div>


</div>
<?php 
include_once "Footer.php";
?>
