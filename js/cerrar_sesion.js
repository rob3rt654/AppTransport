function cerrarSesion() {
  
  $.post('../negocio/AccionVendedor.php', {
    accion: 'cerrarsesion'

  }, function (responseText) {

    location.href = "../index.html";

  });
}