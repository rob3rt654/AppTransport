function llenarSolicitudes() {
  var header = document.getElementById("cartas");
  header.innerHTML = "";

  $.post(
    "../negocio/AccionSolicitudServicio.php",
    {
      accion: "consultarSolicitudesVendedor",
    },
    function (responseText) {
      retorno = "";
      var obj = JSON.parse(responseText);
      var img = ""
      var cont = 0;
      for (i = 0; i < obj.length; i++) {
        img = "../imagenes/"+obj[i].imagenes
        if (cont == 0) {
          retorno = retorno + "<div class='" + "row mt-2" + "'>";
        }
        retorno += "<div class='" + "col-md-6" + "'>";
        retorno += "<div class='" + "card card-stats mb-4 mb-xl-0" + "'>";
        retorno += "<div class=card-body>";
        retorno += "<div class=row>";
        retorno += "<div class=col>";
        retorno +=
          "<h5 class='" +
          "card-title text-uppercase text-muted mb-0" +
          "'>" +
          obj[i].nombre_servicio +
          "</h5>";
        retorno +=
          "<span class='" +
          "h2 font-weight-bold mb-0" +
          "'>Cliente: " +
          obj[i].nombre + obj[i].apellidos + 
          "</span>";
        retorno += "<p  class='" + "mt-3 mb-0 text-sm" + "'>";
        retorno += obj[i].place_id_inicio +" - "+obj[i].place_id_final
        retorno += "</p>";
        retorno += "</div>";
        retorno += "<div class=col-auto>";
        retorno += "<div class='" + "icon icon-shape bg-danger text-white rounded-circle shadow" + "'>";
        retorno += "<i class='" + "fas fa-route" + "'></i>";
        retorno += "</div>";
        retorno += "</div>";
        retorno += "</div>";
        retorno += "<p class='" + "mt-3 mb-0 text-muted text-sm" + "'>";
        retorno += "<span class='" + "text-success mr-2" + "'>";
        retorno += "<i class='" + "fas fa-calendar" + "'></i>";
        retorno += " " + obj[i].fecha_inicio + " - " + obj[i].fecha_final + "</span>";
        retorno += "</p>";
        retorno += "<div class=row>";
        retorno += "<div class=col-md-6>";
        retorno += "<button onclick=abrirModalEstimacion('" +obj[i].id_solicitud+ "') class='" + "btn btn-success mt-2" + "'>Estimar Costo</a>"
        retorno += "<button onclick=abrirModalRechazar('" +obj[i].id_solicitud+ "') class='" + " btn btn-danger mt-2" + "'>Rechazar</a>"
        retorno += "</div>";
        retorno += "</div>";
        retorno += "</div>";
        retorno += "</div>";
        retorno += "</div>";
        if (cont == 1 || i == obj.length - 1) {
          cont = 0;
          retorno = retorno + "</div>";
        } else {
          cont++;
        }
      }
      $("#cartas").html(retorno);
      
      
    }
  );
}