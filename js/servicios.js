function llenarDatos(id) {
  llenarSelectVehiculos(id);
  llenarSelectServicios();
}

function llenarSelectVehiculos(id) {
  var promise = new Promise(function (resolve, reject) {
    $("#vehiculos").html("");

    $.post(
      "../negocio/AccionVehiculo.php",
      {
        accion: "consultar",
        id_vendedor: id,
      },
      function (responseText) {
        retorno = "";
        var obj = JSON.parse(responseText);
        for (i = 0; i < obj.length; i++) {
          $("#vehiculos")
            .append(
              "<option  value=" +
                obj[i].id_vehiculo +
                ">" +
                obj[i].placa +
                "</option>"
            )
            .selectpicker("refresh");
        }
        resolve();
      }
    );
  });

  return promise;
}

function llenarSelectServicios() {
  var promise = new Promise(function (resolve, reject) {
    $("#tipos_servicios").html("");

    $.post(
      "../negocio/AccionTipoServicio.php",
      {
        accion: "consultar",
      },
      function (responseText) {
        retorno = "";
        var obj = JSON.parse(responseText);
        for (i = 0; i < obj.length; i++) {
          $("#tipos_servicios")
            .append(
              "<option  value=" +
                obj[i].id_tipo_servicio +
                ">" +
                obj[i].nombre_tipo_servicio +
                "</option>"
            )
            .selectpicker("refresh");
        }
        resolve();
      }
    );
  });

  return promise;
}

function agregar() {
  if (!document.getElementById("nombre").checkValidity()) {
    alert("El nombre es requerido");
  } else if (!document.getElementById("terminos").checkValidity()) {
    alert("La contraseña es requerida");
  } else {
    $.post(
      "../negocio/AccionServicio.php",
      {
        accion: "insertar",
        terminos_condiciones: $("#terminos").val(),
        nombre_servicio: $("#nombre").val(),
        id_tipo_servicio: $("#tipos_servicios").val(),
        id_vehiculo: $("#vehiculos").val(),
      },
      function (responseText) {
        if (responseText == "1") {
          limpiarCampos();
          cerrar();
          $("#textoModal").html("Se ha insertado correctamente!");
          $("#myModal").modal();
        } else {
          alert("No se ha insertado");
        }
      }
    );
  }
}

function limpiarCampos() {
  $("#terminos").val("");
  $("#nombre").val("");
}

function llenarCartas() {
  var header = document.getElementById("cartas");
  header.innerHTML = "";

  $.post(
    "../negocio/AccionServicio.php",
    {
      accion: "consultar",
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
