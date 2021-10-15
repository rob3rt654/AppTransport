function abrir() {

    limpiarCampos();
    $('#modalAdmi').modal();
    $('#btnActualizar').hide();
    $('#btnAgregar').show();

}
function llenarCampos(id, nombre, apellidos, correo, contrasena) {

    $("#id").val(id);
    $("#nombre").val(nombre);
    $("#apellidos").val(apellidos);
    $("#correo").val(correo);
    $("#contrasena").val(contrasena);
    $('#btnActualizar').show();
    $('#btnAgregar').hide();
    $('#modalAdmi').modal();

}

function cerrar() {

    $('#modalAdmi').modal('hide');
    $('#myModal').modal('hide');

    $('#modalEliminar').modal('hide');
}

function consultar() {


    var body = document.getElementById('tdatos');
    body.innerHTML = "";
    $.post('../negocio/AccionAdministrador.php', {
        accion: 'consultar',

    }, function (responseText) {

        retorno = "";
        var obj = JSON.parse(responseText);
        $("#tbAdmis").dataTable().fnDestroy();

        for (i = 0; i < obj.length; i++) {

            retorno = retorno + "<tr>";
            retorno = retorno + "<td>" + obj[i].nombre + "</td>";
            retorno = retorno + "<td>" + obj[i].apellidos + "</td>";
            retorno = retorno + "<td>" + obj[i].correo + "</td>";
            retorno = retorno + "<td>" + obj[i].contrasena + "</td>";
            retorno = retorno + "<td class=btn>";
            retorno = retorno + "<button onclick=\"" + "llenarCampos('" + obj[i].id + "','" + obj[i].nombre + "','" + obj[i].apellidos + "','" + obj[i].correo + "','" + obj[i].contrasena + "')\"" + "class=btn-editar><i class='" + "fas fa-edit" + "'></i></button>";
            retorno = retorno + "<button onclick=\"" + "abrirModalEliminacion('" + obj[i].id + "')\"" + "class=btn-elimnar><i class='" + "fas fa-trash-alt" + "'></i></button>";
            retorno = retorno + "</td>";
            retorno = retorno + "</tr>";
        }
        $("#tdatos").html(retorno);
        inicializarTabla();
    });



}

function agregar() {

    if (!document.getElementById("nombre").checkValidity()) {
        alert("El nombre es requerido");
    } else if (!document.getElementById("contrasena").checkValidity()) {
        alert("La contraseña es requerida");
    } else if (!document.getElementById("correo").checkValidity()) {
        alert("El correo es requerido");
    } else if (!document.getElementById("apellidos").checkValidity()) {
        alert("Los apellidos son requeridos");
    } else {
        $.post('../negocio/AccionAdministrador.php', {
            accion: 'insertar',
            nombre: $('#nombre').val(),
            contrasena: $('#contrasena').val(),
            correo: $('#correo').val(),
            apellidos: $('#apellidos').val()

        }, function (responseText) {
            if (responseText == "1") {

                limpiarCampos();
                consultar();
                cerrar();
                $("#textoModal").html("Se ha insertado correctamente!");
                $("#myModal").modal();

            } else {

                alert("No se ha insertado");


            }


        });
    }
}
function actualizar() {

    $('#modalConfirmacion').modal('hide');
    if (!document.getElementById("nombre").checkValidity()) {
        alert("El nombre es requerido");
    } else if (!document.getElementById("contrasena").checkValidity()) {
        alert("La contraseña es requerida");
    } else if (!document.getElementById("correo").checkValidity()) {
        alert("El correo es requerido");
    } else if (!document.getElementById("apellidos").checkValidity()) {
        alert("Los apellidos son requeridos");
    } else {
        $.post('../negocio/AccionAdministrador.php', {
            accion: 'actualizar',
            nombre: $('#nombre').val(),
            contrasena: $('#contrasena').val(),
            correo: $('#correo').val(),
            apellidos: $('#apellidos').val(),
            id: $('#id').val()

        }, function (responseText) {
            if (responseText == "1") {

                limpiarCampos();
                consultar();
                cerrar();
                $("#textoModal").html("Se ha actualizado correctamente!");
                $("#myModal").modal();

            } else {

                alert("No se pudo actualizar");

            }
        });
    }
}

function limpiarCampos() {

    $("#nombre").val('');
    $("#contrasena").val('');
    $("#correo").val('');
    $("#apellidos").val('');

}
function eliminar() {

    $.post('../negocio/AccionAdministrador.php', {
        accion: 'eliminar',
        id: $('#admiEliminar').val()

    }, function (responseText) {

        if (responseText == 1) {

            consultar();
            cerrar();
            $("#textoModal").html("Se ha eliminado correctamente!");
            $("#myModal").modal();
        } else {

            alert("No se ha eliminado");

        }

    });

}

function inicializarTabla() {


    $('#tbAdmis').DataTable({
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

function abrirModalEliminacion(id) {

    $('#admiEliminar').val(id);
    $('#modalEliminar').modal();


}

function verificarUsuario() {
    $.post('negocio/AccionVendedor.php', {
      accion: 'verificarVendedor',
      correo: $('#user').val(),
      contra: $('#password').val()
  
    }, function (responseText) {
        if (responseText == 1) {
        location.href = "./vista/vistaPrincipal.php";
      } else {
        alert("Contraseña incorrecta");
      }
    });
  }
  
  function cerrarSesion() {
  
    $.post('../negocio/AccionVendedor.php', {
      accion: 'cerrarsesion'
  
    }, function (responseText) {
  
      location.href = "../index.html";
  
    });
  }
  function abrirModal() {


    $("#modalConfirmacion").modal();

}