function consultarPagos() {
  var body = document.getElementById('tdatos');
  body.innerHTML = "";
  $.post('../negocio/AccionPago.php', {
      accion: 'consultarPagos',

  }, function (responseText) {
      retorno = "";
      var obj = JSON.parse(responseText);
      $("#tbPagos").dataTable().fnDestroy();

      for (i = 0; i < obj.length; i++) {

          retorno = retorno + "<tr>";
          retorno = retorno + "<td>" + obj[i].id_servicio + "</td>";
          if(obj[i].reestimacion == null || obj[i].estado_reestimacion == "rechazada"){
            retorno = retorno + "<td>" + obj[i].estimacion + "</td>";
          }else{
            retorno = retorno + "<td>" + obj[i].reestimacion + "</td>";
          }
          retorno = retorno + "<td>" + obj[i].numero_tarjeta + "</td>";
          retorno = retorno + "<td>" + obj[i].nombre_propietario + "</td>";
          retorno = retorno + "<td class=btn>";
          retorno = retorno + "<button onclick=\"" + "abrirModalSolicitud('" +obj[i].id_solicitud+ "', '" +obj[i].place_id_inicio+ "', '" +obj[i].place_id_final+ "', '" +obj[i].punto_inicio_lat+ "', '" +obj[i].punto_inicio_lon+ "', '" +obj[i].punto_final_lat+ "', '" +obj[i].punto_final_lon+ "', '" +obj[i].fecha_inicio+ "', '" +obj[i].fecha_final+ "', '" +obj[i].estimacion+ "','" +obj[i].cantidad_personas+ "')\"" + "class=btn><i class='" + "fas fa-eye" + "'></i></button>";          retorno = retorno + "</td>";
          retorno = retorno + "</tr>";
      }
      $("#tdatos").html(retorno);
      inicializarTabla();
  });
}

function inicializarTabla() {


  $('#tbPagos').DataTable({
      language: {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Entradas",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
              "first": "Primero",
              "last": "Ultimo",
              "next": "Siguiente",
              "previous": "Anterior"
          }
      },

  });


}

function abrirModalSolicitud(id, lugar_1, lugar_2, lat1, lon1, lat2, lon2, fecha_inicio, fecha_final, estimacion, cantpersonas){
  initMap();
  var punto1 = new google.maps.LatLng(lat1, lon1);
  var punto2 = new google.maps.LatLng(lat2, lon2);
  marcarRuta(punto1, punto2);
  $("#fechas").html(fecha_inicio+" - "+fecha_final);
  $("#viaje").html(lugar_1+" - "+lugar_2);
  $("#estimacion").html(estimacion+" colones");
  $("#cantpersonas").html(cantpersonas);
  $("#id_solicitud").val(id);
  $("#modalSolicitud").modal();
}

function cerrar(){
  $('#modalSolicitud').modal('hide');
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