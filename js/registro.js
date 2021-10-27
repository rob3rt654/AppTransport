import Swal from 'sweetalert2'
function registrar(){
    console.log("entre")
    var formulario = document.getElementById('formregistroUsuario');

    var datos = new FormData(formulario);
    datos.append('accion', 'registrar');    
    if (!document.getElementById("name").checkValidity()) {
        alert("El nombre es requerido");
    } else if (!document.getElementById("apellido").checkValidity()) {
        alert("El apellido es requerido");
    } else if (!document.getElementById("date").checkValidity()) {
        alert("La fecha es requerida");
    } else if (!document.getElementById("phone").checkValidity()) {
        alert("El celular es requerido");
    } else if (!document.getElementById("email").checkValidity()) {
        alert("El email es requerido");
    } else if (!document.getElementById("password").checkValidity()) {
        alert("El password es requerido");
    } else { 
        
    fetch('../negocio/AccionRegistroUsuario.php',{
        method: 'POST',
        body: datos
    }).then(res=>res.json())
        .then(data=>{
            console.log(data)
            if(data=="1"){
                Swal.fire({
                    title: 'Registro exitoso',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                  })
            }else{
                Swal.fire({
                    title: 'Ocurrió un error',
                    text: 'Los datos no se registraron, intenta de nuevo',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1500
                  })

            }
           
            document.getElementById("formregistroUsuario").reset();
        })

    }
}
    

