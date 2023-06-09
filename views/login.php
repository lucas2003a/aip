<style>
  .gradient-custom {
    background:#6a11cb ;
    
    background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

    background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
  }


</style>

<?php

?>

<!doctype html>
<html lang="es">

<head>
  <title>Registrarse</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <section class="vh gradient-custom">
    <div class="container py-5 h-auto">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-6 ">
          <!--INICIO DE CARD-->
          <div class="card bg-primary text-white">
            <div class="card-body text-center">
              <div class="mb-md-5 mt-md-4 pb-5">
                <h2 class="fw-bold mb-2 text-uppercase">registro de usuarios</h2>
                <p class="text-white-50 mb-5">Porfavor registrate</p>
                <div class="m-5">
                  <form id="formulario-login" autocomplete="off">
                    <div class="mb-4">
                      <label for="nombres" class="form-label">Nombres:</label>
                      <input type="text" id="nombres" class="form-control form-control-sm" autofocus>
                    </div>
                    <div class="mb-4">
                      <label for="apellidos" class="form-label">Apellidos:</label>
                      <input type="text" id="apellidos" class="form-control form-control-sm">
                    </div>
                    <div class="mb-4">
                      <label for="nusuario" class="form-label">Usuario:</label>
                      <input type="text" id="nusuario" class="form-control form-control-sm">
                    </div>
                    <div class="mb-4">
                      <label for="claveacceso" class="form-label">Contraseña:</label>
                      <input type="password" id="claveacceso" class="form-control form-control-sm">
                    </div>
                    <button type="button" id="iniciar-sesion"class="btn btn-lg btn-outline-light fw-bold" >Iniciar sesion</button>
                  </form>
                </div>
              </div>
            </div>

          </div>
          <!-- FIN DE CARD-->
        </div>
      </div>
    </div>
  </section>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>  

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function(){

      function registrarLogin(){
        const nombres   = $("#nombres").val();
        const apellidos = $("#apellidos").val();
        const nusuario  = $("#nusuario").val();
        const clave     = $("#claveacceso").val();

        if(nombres!="" && apellidos!="" && nusuario!="" && clave!=""){
          Swal.fire({
            icon: 'question',
            title: 'Usuarios',
            text: '¿Está seguro de guardar el registro?',
            footer: 'Desarrollado con PHP',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#3498DB',
            showCancelButton: true,
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            //Identificando acción del usuario
            if (result.isConfirmed){
                      //Enviaremos los datos dentro de un OBJETO
            var formData = new FormData();

              formData.append("operacion", "registrar");
              formData.append("nombres", $("#nombres").val());
              formData.append("apellidos", $("#apellidos").val());
              formData.append("nusuario", $("#nusuario").val());
              formData.append("claveacceso", $("#claveacceso").val());

              $.ajax({
                url: '../controllers/usuario.controller.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function(){
                  $("#formulario-login")[0].reset();
                  //$("#modal-estudiante").modal("hide");
                  Swal.fire({
                    position: 'midle-center',
                    icon: 'success',
                    title: 'Acción exitosa',
                    showConfirmButton: false,
                    timer: 1500
                  }).then(()=>{
                    window.location.href="kardex.php";
                  });
                }
              });
            }
          });
        }else{
          Swal.fire({
            position: 'midle-center',
            icon: 'error',
            title: 'Llene todo los campos',
            showConfirmButton: false,
            timer: 1500
          });
        }
      }
      /*

      function iniciarSesion(){
        const usuario = $("#nusuario").val();
        const clave = $("#clave").val();

        if(usuario !="" && clave != ""){
         $.ajax({
          url : '../controllers/usuario.controller.php',
          type : 'POST',
          data : {
            operacion : 'login',
            nusuario : usuario,
            claveingresada : clave
          },
          dataType: 'JSON',
          success : function(result){
            console.log(result);
            if(result["status"]){
              window.location.href="kardex.php";
            }else{
              Swal.fire({
                  icon: 'error',
                  title: (result["mensaje"]),
                  text: 'Has cometido un error!',
                  footer: '<a href="">¿Poqué sucedió esto?</a>'
                })
            }
          }
         }); 
        }
      }*/
      $("#iniciar-sesion").click(registrarLogin);
    });
  </script>
</body>

</html>