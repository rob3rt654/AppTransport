<?php 
include_once "Header.php";
include_once "Modals/ModalVehiculo.php";
?>

    <div class="container-fluid mt-3">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Nuevo Vehiculo</button>



    <div class="container mt-3">
        <table id="data_table" class="table table-striped">
            <thead>
                <tr>
                    
                    <th>Placa</th>
                    <th>Capacidad Peso <?php echo $objeto; ?></th>
                    <th>Caspacidad Personas</th>
                    <th>Tipo Vehiculos</th>
                    
                </tr>
            </thead>
                <tbody>
                    <?php
                
                    /*while( $developer = mysqli_fetch_assoc($resultset) ) {?>
                        <tr id="<?php echo $developer ['id_vehiculo']; ?>">
                           
                            <td><?php echo $developer ['placa']; ?></td>
                            <td><?php echo $developer ['capacidad_peso']; ?></td>
                            <td><?php echo $developer ['capacidad_personas']; ?></td>
                            <td><?php echo $developer ['id_tipo_vehiculo']; ?></td>
                            
                        </tr>
                    <?php } */?>
                </tbody>
        </table>
    </div>

    </div>


</div>
<?php 
include_once "Footer.php";
?>
