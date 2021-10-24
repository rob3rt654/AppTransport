<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Nuevo Vehiculo </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="AccionVehiculo.php" method="POST">
      <input type="hidden" class="form-control" id="accion" name="accion"  value="insertar">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Color</label>
            <input type="text" class="form-control" id="color" name="color"> 
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Placa</label>
            <input type="text" class="form-control" id="placa" name="placa"> 
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Cantidad de peso</label>
            <input type="text" class="form-control" id="peso" name="peso"> 
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Cantidad de personas</label>
            <input type="text" class="form-control" id="personas" name="personas"> 
          </div>

          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Tipo Vehiculo</label>
          <select class="form-select form-control" aria-label="Default select example" id="tipo" name="tipo">
            <option selected>Tipo Vehiculo</option>
            <option value="1">doble cabina</option>
            <option value="2">Camion ligero</option>
            <option value="3">Camion Pesado</option>
          </select>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>