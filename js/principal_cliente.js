function llenarCartas() {
  var header = document.getElementById("cartas");
  header.innerHTML = "";

  $.post(
    "../negocio/AccionServicio.php",
    {
      accion: "consultarTodos",
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
          obj[i].tipo_servicio +
          "</h5>";
        retorno +=
          "<span class='" +
          "h2 font-weight-bold mb-0" +
          "'>" +
          obj[i].nombre_servicio +
          "</span>";
        retorno += "</div>";
        retorno += "<div class=col-auto>";
        retorno += "<span class='" +
        "" +
        "' > <img src='" + img +
        "' width=200 height=200></span>";
        retorno += "</div>";
        retorno += "</div>";
        retorno += "<p class='" + "mt-3 mb-0 text-muted text-sm" + "'>";
        retorno += "<span class='" + "text-success mr-2" + "'>";
        retorno += "<i class='" + "fas fa-car" + "'></i>";
        retorno += " " + obj[i].placa + "</span>";
        retorno += "</p>";
        retorno += "<button onclick=abrirModal('" +obj[i].id_servicio+ "') class='" + "btn btn-sm btn-primary" + "'>Solicitar Servicio</a>"
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


function abrirModal(id_servicio){
  $('#id_servicio').val(id_servicio);
  $('#modalSolicitud').modal();
  initMap();
}

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


function solicitarServicio(){
  var place1 = autocomplete.getPlace();
  var place2 = autocomplete2.getPlace();
  console.log(place1)

  var lat_1 = place1.geometry.location.lat()
  var lon_1 = place1.geometry.location.lng()
  var lat_2 = place2.geometry.location.lat()
  var lon_2 = place2.geometry.location.lng()
  if (!document.getElementById("fecha_inicio").checkValidity()) {
    alert("La fecha inicial es requerida");
  } else if (!document.getElementById("fecha_final").checkValidity()) {
    alert("La fecha de finalizacion es requerida");
  } else {
    $.post(
      "../negocio/AccionSolicitudServicio.php",
      {
        accion: "insertar",
        fecha_inicio: $("#fecha_inicio").val(),
        fecha_final: $("#fecha_final").val(),
        punto_inicio_lat: lat_1,
        punto_inicio_lon: lon_1,
        punto_final_lat: lat_2,
        punto_final_lon: lon_2,
        id_servicio: $("#id_servicio").val(),
        place_id_inicio: $("#nombrelugar1").val(),
        place_id_final: $("#nombrelugar2").val(),
        cantidad_personas: $("#cantidad_personas").val()
      },
      function (responseText) {
        if (responseText == "1") {
          limpiarCampos();
          $('#modalSolicitud').modal('hide');
          $("#textoModal").html("Se ha solicitado el servicio, esperemos la respuesta del vendedor!");
          $("#myModal").modal();
        } else {
          alert("No se ha insertado");
        }
      }
    );
  }

}

function limpiarCampos() {

  $("#fecha_inicio").val("");
  $("#fecha_final").val('');
  $("#duracion").val('');
  $("#distancia").val('');
  $("#searchInput").val('');
  $("#searchInput2").val('');

}

function cerrar(){
  $('#myModal').modal('hide');
  $('#modalSolicitud').modal('hide');
}