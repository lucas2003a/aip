<?php

session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == false){
  header('Location:../index.php');
}
?>


<!doctype html>
<html lang="en">
<head>
  <title>Articulos</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!--iconos de  bottstrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

  <style>
    .gradient-custom {
      background:#6a11cb ;
      
      background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

      background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
    }
  </style>

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>

  </main>
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <nav class="nav nav-tabs flex-column">
        <a class="nav-link text-light" href="articulos.php">Articulos</a>
        <a class="nav-link text-light" href="grupos.php">Grupos</a>
        <a class="nav-link text-light" href="kardex.php">Kardex</a>
      </nav>
      <div class="card mt-2">
          <div class="card-header bg-primary text-light">
              <div class="row">
                  <div class="col-md-6">
                      <h1><strong>Lista de Articulos</strong></h1>
                  </div>
                  <div class="col-md-6 text-end">
                    <a href="../controllers/usuario.controller.php?operacion=finalizar" style="text-decoration: none;" class="btn btn-danger btn-sm"><i class="bi bi-box-arrow-left"></i> Cerrar sesión</a>
                      <button class="btn btn-success btn-sm" id="abrir-modal" data-bs-toggle="modal" data-bs-target="#modal-registro-articulos"><i class="bi bi-plus-circle-fill"></i> Agregar Artículo</button>
                  </div>
              </div>
          </div>
          <div class="card-body">
              <table class="table table-sm table-striped " id="tabla-articulos">
                  <colgroup>
                      <col width="10%">
                      <col width="20%">
                      <col width="30%">
                      <col width="30%">
                      <col width="10%">
                  </colgroup>
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Grupo</th>
                          <th>Artículo</th>
                          <th>Descripción</th>
                          <th>Operaciones</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
          </div>
      </div>
    </div>

    <!-- Modal trigger button -->
    
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modal-registro-articulos" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="modalTitleId">Registrar Articulos</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form id="formulario-articulos" autocomplete="off">
                      <div class="mb-3">
                          <label for="codigog" class="form-label">Codigo del grupo</label>
                          <select name="codigog" id="codigog" class="form-select form-select-sm">
                            <option value="">Seleccione</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="codigoa" class="form-label">Codigo del artículo</label>
                          <input type="text" class="form-control form-control-sm " id="codigoa">
                          <!--<select name="codigoa" id="codigoa" class="form-select form-select-sm">
                            <option value="">Seleccione</option>
                          </select>-->

                      </div>
                      <div class="mb-3">
                          <label for="descripcion" class="form-label">Descripción</label>
                          <input type="text" class="form-control form-control-sm" id="descripcion">
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary" id="guardar-articulo">Guardar</button>
              </div>
          </div>
      </div>
    </div>
  </section>
  
  <!-- Optional: Place to the bottom of scripts -->

  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  
  <!-- jQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <script>
    $(document).ready(function(){

        let datosNuevos = true;
        let idarticuloactualizar = -1;

        function obtenerGrupos(){
          $.ajax({
            url : '../controllers/grupo.controller.php',
            type : 'POST',
            data : {operacion : 'listado'},
            dataType: 'text',
            success : function(result){
              $("#codigog").html(result);
            }
          });
        }

        /*function obtenerArticulos(){
          $.ajax({
            url : '../controllers/articulo.controller.php',
            type : 'POST',
            data : {operacion : 'listado'},
            dataType : 'text',
            success : function(result){
              $("#codigoa").html(result);
            }
          });
        }*/
        
        function mostrarArticulos(){
            $.ajax({
                url : '../controllers/articulo.controller.php',
                type : 'POST',
                data: {operacion : 'listar'},
                dataType : 'text',
                success : function(result){
                    $("#tabla-articulos tbody").html(result);
                }
            });
        }
        
        function registrarArticulos(){
          if(confirm("¿seguro de salvar los datos?")){    
            let datos = {
              operacion   : 'registrar',
              idarticulo  : idarticuloactualizar,
              idgrupo     : $("#codigog").val(),
              codigoa     : $("#codigoa").val(),
              descripcion : $("#descripcion").val()
            };

            if(!datosNuevos){
              datos["operacion"] = "actualizar";
            }
            $.ajax({
              url : '../controllers/articulo.controller.php',
              type : 'POST',
              data : datos,
              success : function(result){
                if(result == ""){
                  $("#formulario-articulos")[0].reset();

                  mostrarArticulos();

                  $("#modal-registro-articulos").modal('hide');
                }
              }
            });
          }       
        }

        /*$("#codigog").change(function(){
          const idgrupoFiltro = $(this).val();
          $.ajax({
            url : '../controllers/articulo.controller.php',
            type: 'POST',
            data : { 
              operacion : 'listado',
              idgrupo : idgrupoFiltro
            },
            dataType : 'text',
            success : function(result){
              $("#codigoa").html(result);
            }
          });
        });*/

        function abrirModal(){

          datosNuevos = true;
          $("#modalTitleId").html("Registro de artículos");
          $("#formulario-articulos")[0].reset();
        }

        $("#guardar-articulo").click(registrarArticulos);
        $("#abrir-modal").click(abrirModal);

        $("#tabla-articulos tbody").on("click",".editar",function(){
          const idarticuloEditar = $(this).data("idarticulo");
          $.ajax({
            url : '../controllers/articulo.controller.php',
            type : 'POST',
            data : {
              operacion : 'obtenerarticulo',
              idarticulo : idarticuloEditar
            },
            dataType : 'JSON',
            success : function(result){
              console.log(result);

              datosNuevos = false;

              idarticuloactualizar = result['idarticulo'];
              $("#codigog").val(result["idgrupo"]);
              $("#codigoa").val(result["codigoa"]);
              $("#descripcion").val(result["descripcion"]);

              $("#modalTitleId").html("Actualizar datos de artículos");

              $("#modal-registro-articulos").modal("show");
            }
          });
        });

        $("#tabla-articulos tbody").on("click",".eliminar",function(){
          const idarticuloEliminar = $(this).data("idarticulo");
          if (confirm("¿Seguro de eliminar el registro?")){
            $.ajax({
            url : '../controllers/articulo.controller.php',
            type : 'POST',
            data : {
              operacion : 'eliminar',
              idarticulo : idarticuloEliminar
            },
            success: function(result){
              if(result == ""){
                mostrarArticulos();
              }
            }
          });
          }
        });

        $("#modal-registro-articulos").on("show.bs.modal", event =>{
        $("#codigog").focus();

        obtenerGrupos();
        //obtenerArticulos();
        });
      
      mostrarArticulos();
    });
    </script>
  </body>
</html>