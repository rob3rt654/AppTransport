function llenarSolicitudes() {
  var header = document.getElementById("cartas");
  header.innerHTML = "";

  $.post(
    "../negocio/AccionSolicitudServicio.php",
    {
      accion: "consultarSolicitudesCliente",
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
        retorno += "<div id='" +  obj[i].id_solicitud + "' class='" + "col-md-6" + "'>";
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
          "'>Vendedor: " +
          obj[i].nombre + " " + obj[i].apellidos + 
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
        retorno += "<div class=col-md-12>";
        if(obj[i].estado == 'confirmado'){
          retorno += "<p class='" + "mt-3 mb-0 text-muted text-sm" + "'>";
          retorno += "<span class='" + "text-success mr-2" + "'>";
          retorno += "<i class='" + "fas fa-check" + "'></i>";
          retorno += " Confirmado y pagado </span>";
          retorno += "</p>";
          retorno += "<button  onclick= \"" + "abrirModalSolicitud2('" +obj[i].id_solicitud+ "', '" +obj[i].place_id_inicio+ "', '" +obj[i].place_id_final+ "', '" +obj[i].punto_inicio_lat+ "', '" +obj[i].punto_inicio_lon+ "', '" +obj[i].punto_final_lat+ "', '" +obj[i].punto_final_lon+ "', '" +obj[i].fecha_inicio+ "', '" +obj[i].fecha_final+ "', '" +obj[i].estimacion+ "', '" +obj[i].cantidad_personas+ "')\"" 
          + "class='" + "btn btn-success mt-2" + "'>Ver detalles</a></button>"
        }else if(obj[i].estimacion == null){
          retorno += "<span class='" + "badge badge-dot mr-4 mt-3" + "'><i class=bg-warning></i> Esperando estimacion...</span>";
          retorno += "<br>"
          retorno += "<button onclick=cancelarServicio('" +obj[i].id_solicitud+ "') class='" + " btn btn-danger mt-2" + "'>Cancelar Solicitud</a>"
        }else if(obj[i].estimacion != null && obj[i].reestimacion == null){
          retorno += "<p class='" + "mt-3 mb-0 text-muted text-sm" + "'>";
          retorno += "<span class='" + "text-success mr-2" + "'>";
          retorno += "<i class='" + "fas fa-money-bill-alt" + "'></i>";
          retorno += " Estimacion: " + obj[i].estimacion + "</span>";
          retorno += "</p>";
          retorno += "<button  onclick= \"" + "abrirModalSolicitud('" +obj[i].id_solicitud+ "', '" +obj[i].place_id_inicio+ "', '" +obj[i].place_id_final+ "', '" +obj[i].punto_inicio_lat+ "', '" +obj[i].punto_inicio_lon+ "', '" +obj[i].punto_final_lat+ "', '" +obj[i].punto_final_lon+ "', '" +obj[i].fecha_inicio+ "', '" +obj[i].fecha_final+ "', '" +obj[i].estimacion+ "', '" +obj[i].cantidad_personas+ "')\"" 
          + "class='" + "btn btn-success mt-2" + "'>Ver detalles</a>"
          retorno += "<button  onclick= \"" + "solicitarNuevaEstimacion('" +obj[i].id_solicitud+ "')\"" 
          + "class='" + "btn btn-danger mt-2" + "'>Solicitar Reestimación</a>"
          retorno += "<button  onclick= \"" + "confirmarServicioDirecto('" +obj[i].id_solicitud+ "', '" +obj[i].place_id_inicio+ "', '" +obj[i].place_id_final+ "', '" +obj[i].punto_inicio_lat+ "', '" +obj[i].punto_inicio_lon+ "', '" +obj[i].punto_final_lat+ "', '" +obj[i].punto_final_lon+ "', '" +obj[i].fecha_inicio+ "', '" +obj[i].fecha_final+ "', '" +obj[i].estimacion+ "', '" +obj[i].cantidad_personas+ "')\"" 
          + "class='" + "btn btn-primary mt-2" + "'>Confirmar Servicio</a></button>"
        }else if(obj[i].estimacion != null && obj[i].reestimacion != null && obj[i].estado_reestimacion == null){
          retorno += "<p class='" + "mt-3 mb-0 text-muted text-md" + "'>";
          retorno += "<span class='" + "text-success mr-2" + "'>";
          retorno += "<i class='" + "fas fa-money-bill-alt" + "'></i>";
          retorno += " Estimación: " + obj[i].estimacion + "</span>";
          retorno += "<span class='" + "text-danger mr-2" + "'>";
          retorno += "<i class='" + "fas fa-money-bill-alt" + "'></i>";
          retorno += "  Tu estimación: " + obj[i].reestimacion + "</span>";
          retorno += "</p>";
          retorno += "<button  onclick= \"" + "abrirModalSolicitud('" +obj[i].id_solicitud+ "', '" +obj[i].place_id_inicio+ "', '" +obj[i].place_id_final+ "', '" +obj[i].punto_inicio_lat+ "', '" +obj[i].punto_inicio_lon+ "', '" +obj[i].punto_final_lat+ "', '" +obj[i].punto_final_lon+ "', '" +obj[i].fecha_inicio+ "', '" +obj[i].fecha_final+ "', '" +obj[i].estimacion+ "', '" +obj[i].cantidad_personas+ "')\"" 
          + "class='" + "btn btn-success mt-2" + "'>Ver detalles</a></button>"
          retorno += "<span class='" + "badge badge-dot ml-4 mt-3" + "'><i class=bg-warning></i> Esperando confirmación...</span>";
        }else if(obj[i].estimacion != null && obj[i].reestimacion != null && obj[i].estado_reestimacion == "rechazada"){
          retorno += "<p class='" + "mt-3 mb-0 text-muted text-md" + "'>";
          retorno += "<span class='" + "text-success mr-2" + "'>";
          retorno += "<i class='" + "fas fa-money-bill-alt" + "'></i>";
          retorno += " Estimación: " + obj[i].estimacion + "</span>";
          retorno += "<span class='" + "text-danger mr-2" + "'>";
          retorno += "<i class='" + "fas fa-money-bill-alt" + "'></i>";
          retorno += "  Tu estimación: " + obj[i].reestimacion + " (rechazada)</span>";
          retorno += "</p>";
          retorno += "<button  onclick= \"" + "abrirModalSolicitud('" +obj[i].id_solicitud+ "', '" +obj[i].place_id_inicio+ "', '" +obj[i].place_id_final+ "', '" +obj[i].punto_inicio_lat+ "', '" +obj[i].punto_inicio_lon+ "', '" +obj[i].punto_final_lat+ "', '" +obj[i].punto_final_lon+ "', '" +obj[i].fecha_inicio+ "', '" +obj[i].fecha_final+ "', '" +obj[i].estimacion+ "', '" +obj[i].cantidad_personas+ "')\"" 
          + "class='" + "btn btn-success mt-2" + "'>Ver detalles</a></button>"
          retorno += "<button  onclick= \"" + "confirmarServicioDirecto('" +obj[i].id_solicitud+ "', '" +obj[i].place_id_inicio+ "', '" +obj[i].place_id_final+ "', '" +obj[i].punto_inicio_lat+ "', '" +obj[i].punto_inicio_lon+ "', '" +obj[i].punto_final_lat+ "', '" +obj[i].punto_final_lon+ "', '" +obj[i].fecha_inicio+ "', '" +obj[i].fecha_final+ "', '" +obj[i].estimacion+ "', '" +obj[i].cantidad_personas+ "')\"" 
          + "class='" + "btn btn-primary mt-2" + "'>Confirmar Servicio</a></button>"
        }else if(obj[i].estimacion != null && obj[i].reestimacion != null && obj[i].estado_reestimacion == "aceptada"){
          retorno += "<p class='" + "mt-3 mb-0 text-muted text-md" + "'>";
          retorno += "<span class='" + "text-success mr-2" + "'>";
          retorno += "<i class='" + "fas fa-money-bill-alt" + "'></i>";
          retorno += " Estimación: " + obj[i].estimacion + "</span>";
          retorno += "<span class='" + "text-success mr-2" + "'>";
          retorno += "<i class='" + "fas fa-money-bill-alt" + "'></i>";
          retorno += "  Tu estimación: " + obj[i].reestimacion + " (aceptada)</span>";
          retorno += "</p>";
          retorno += "<button  onclick= \"" + "abrirModalSolicitud('" +obj[i].id_solicitud+ "', '" +obj[i].place_id_inicio+ "', '" +obj[i].place_id_final+ "', '" +obj[i].punto_inicio_lat+ "', '" +obj[i].punto_inicio_lon+ "', '" +obj[i].punto_final_lat+ "', '" +obj[i].punto_final_lon+ "', '" +obj[i].fecha_inicio+ "', '" +obj[i].fecha_final+ "', '" +obj[i].estimacion+ "', '" +obj[i].cantidad_personas+ "')\"" 
          + "class='" + "btn btn-success mt-2" + "'>Ver detalles</a></button>"
          retorno += "<button  onclick= \"" + "confirmarServicioDirecto('" +obj[i].id_solicitud+ "', '" +obj[i].place_id_inicio+ "', '" +obj[i].place_id_final+ "', '" +obj[i].punto_inicio_lat+ "', '" +obj[i].punto_inicio_lon+ "', '" +obj[i].punto_final_lat+ "', '" +obj[i].punto_final_lon+ "', '" +obj[i].fecha_inicio+ "', '" +obj[i].fecha_final+ "', '" +obj[i].estimacion+ "', '" +obj[i].cantidad_personas+ "')\"" 
          + "class='" + "btn btn-primary mt-2" + "'>Confirmar Servicio</a></button>"
        }
         
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

function cerrar(){
  $('#modalSolicitud').modal('hide');
  $('#modalEliminar').modal('hide');
  $('#myModal').modal('hide');
  $('#modalReestimacion').modal('hide');
  $('#modalPago').modal('hide');
}

function solicitarNuevaEstimacion(id){
  $("#id_solicitud_reestimacion").val(id)
  $("#modalReestimacion").modal();
}

function cancelarServicio(id){
  $("#solicitudEliminar").val(id)
  $("#modalEliminar").modal();
}

function abrirModalSolicitud(id, lugar_1, lugar_2, lat1, lon1, lat2, lon2, fecha_inicio, fecha_final, estimacion, cant_personas){
  initMap();
  var punto1 = new google.maps.LatLng(lat1, lon1);
  var punto2 = new google.maps.LatLng(lat2, lon2);
  marcarRuta(punto1, punto2);
  $(".pago_row").css('display', 'none');
  $(".mapa_row").css('display', 'block');
  $("#btnconfirmarservicio").css('display', 'block');
  $("#btnconfirmarpago").css('display', 'none');
  $("#fechas").html(fecha_inicio+" - "+fecha_final);
  $("#viaje").html(lugar_1+" - "+lugar_2);
  $("#estimacion").html(estimacion+" colones");
  $("#cantpersonas").html(cant_personas);
  $("#id_solicitud").val(id);
  $("#modalSolicitud").modal();
}

function abrirModalSolicitud2(id, lugar_1, lugar_2, lat1, lon1, lat2, lon2, fecha_inicio, fecha_final, estimacion, cant_personas){
  initMap();
  var punto1 = new google.maps.LatLng(lat1, lon1);
  var punto2 = new google.maps.LatLng(lat2, lon2);
  marcarRuta(punto1, punto2);
  $(".pago_row").css('display', 'none');
  $(".mapa_row").css('display', 'block');
  $("#btnconfirmarservicio").css('display', 'none');
  $("#btnconfirmarpago").css('display', 'none');
  $("#fechas").html(fecha_inicio+" - "+fecha_final);
  $("#viaje").html(lugar_1+" - "+lugar_2);
  $("#estimacion").html(estimacion+" colones");
  $("#cantpersonas").html(cant_personas);
  $("#id_solicitud").val(id);
  $("#modalSolicitud").modal();
}

function confirmarServicioDirecto(id, lugar_1, lugar_2, lat1, lon1, lat2, lon2, fecha_inicio, fecha_final, estimacion, cant_personas){
  confirmarServicio();
  $("#fechas").html(fecha_inicio+" - "+fecha_final);
  $("#viaje").html(lugar_1+" - "+lugar_2);
  $("#estimacion").html(estimacion+" colones");
  $("#cantpersonas").html(cant_personas);
  $("#id_solicitud").val(id);
  $("#modalSolicitud").modal();
}

function confirmarServicio(){
  $(".mapa_row").css('display', 'none');
  $(".pago_row").css('display', 'block');
  $("#btnconfirmarservicio").css('display', 'none');
  $("#btnconfirmarpago").css('display', 'block');
}

function confirmarPago(){
  $("#modalPago").modal();
}

function enviarSolicitudReestimacion(){
  $.post(
    "../negocio/AccionSolicitudServicio.php",
    {
      accion: "solicitudReestimacion",
      id: $("#id_solicitud_reestimacion").val(),
      estimacion: $("#estimacion").val().replace(/,/g, ""),
      motivo: $("#motivo").val(),
    },
    function (responseText) {
      if (responseText == "1") {
        cerrar();
        location.href = "./vistaSolicitudesCliente.php";
        $("#textoModalConfirmacion").html("Se ha enviado correctamente!");
        $("#myModal").modal();
      } else {
        alert("No se ha rechazado");
      }
    }
  );
}

function rechazarSolicitud(){
  $.post(
    "../negocio/AccionSolicitudServicio.php",
    {
      accion: "rechazarSolicitud",
      id: $("#solicitudEliminar").val(),
    },
    function (responseText) {
      if (responseText == "1") {
        cerrar();
        $("#textoModalConfirmacion").html("Se ha cancelado correctamente!");
        $("#myModal").modal();
        $("#"+$("#solicitudEliminar").val()).remove()
      } else {
        alert("No se ha rechazado");
      }
    }
  );
}

function realizarPago(){
  $.post(
    "../negocio/AccionSolicitudServicio.php",
    {
      accion: "realizarPago",
      id: $("#id_solicitud").val(),
      nombre: $("#nombre").val(),
      num_tarjeta: $("#num_tarjeta").val(),
      vencimiento: $("#vencimiento").val(),
      cvc: $("#cvc").val(),
    },
    function (responseText) {
      if (responseText == "1") {
        cerrar();
        location.href = "./vistaSolicitudesCliente.php";
        $("#textoModalConfirmacion").html("Se ha realizado el pago con éxito!");
        $("#myModal").modal();
      } else {
        alert("No se ha rechazado");
      }
    }
  );
}

//mapa

var directionsRenderer;
var directionsService;
var map;
var infowindow;
var marker;
var autocomplete;
var autocomplete2;
function initMap() {
    directionsService = new google.maps.DirectionsService();
    directionsRenderer = new google.maps.DirectionsRenderer();

    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 9.9333296,
            lng: -84.0833282
        },
        zoom: 13
    });
    directionsRenderer.setMap(map);

    var input = document.getElementById('searchInput');

    var input2 = document.getElementById('searchInput2');

    autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
   

    autocomplete2 = new google.maps.places.Autocomplete(input2);
    autocomplete2.bindTo('bounds', map);

    infowindow = new google.maps.InfoWindow();
    marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });


    autocomplete.addListener('place_changed', function () {
        var place1 = autocomplete.getPlace();
        var place2 = autocomplete2.getPlace();
        
        var punto1 = new google.maps.LatLng(place1.geometry.location.lat(), place1.geometry.location.lng());
        var punto2 = new google.maps.LatLng(place2.geometry.location.lat(), place2.geometry.location.lng());
        marcarRuta(punto1, punto2);
        obtenerNombreLugar(place1.place_id, "nombrelugar1")
        obtenerNombreLugar(place2.place_id, "nombrelugar2")
    });
    autocomplete2.addListener('place_changed', function () {
        var place1 = autocomplete.getPlace();
        var place2 = autocomplete2.getPlace();
        var punto1 = new google.maps.LatLng(place1.geometry.location.lat(), place1.geometry.location.lng());
        var punto2 = new google.maps.LatLng(place2.geometry.location.lat(), place2.geometry.location.lng());
        marcarRuta(punto1, punto2);
        obtenerNombreLugar(place1.place_id, "nombrelugar1")
        obtenerNombreLugar(place2.place_id, "nombrelugar2")
    });
}

function obtenerNombreLugar(id,nombreInput){

  var request = {
      placeId: id,
      fields: ['name']
    };
    
    service = new google.maps.places.PlacesService(map);
    service.getDetails(request, callback);
    
    function callback(place, status) {
      if (status == google.maps.places.PlacesServiceStatus.OK) {
        
        $("#"+nombreInput).val(place.name);

      }
    }

}

function marcarRuta(punto1, punto2) {

  infowindow.close();
  marker.setVisible(false);



  directionsService.route({
      origin: punto1,
      destination: punto2,
      travelMode: 'DRIVING'
  },
      function (response, status) {
          if (status === 'OK') {
              directionsRenderer.setDirections(response);


              var route = response.routes[0];
              var duration = "";
              var distancia = "";
  
              route.legs.forEach(function (leg) {

            // The leg duration in seconds.
              duration = leg.duration.text;
              distancia = leg.distance.text;

              });

              $("#duracion").val(duration);
              $("#distancia").val(distancia);

          } else {
              window.alert('Directions request failed due to ' + status);
          }
      });
}