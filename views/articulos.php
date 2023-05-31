<?php
?>

<!doctype html>
<html lang="en">

  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
      
    <!--iconos de  bottstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

  </head>

  <body>
    <header>
      <!-- place navbar here -->
    </header>
    <main>

    </main>

    <div class="container mt-3">
      <div class="card">
          <div class="card-header bg-primary text-light">
              <div class="row">
                  <div class="col-md-6">
                      <strong>Lista de artículos</strong>
                  </div>
                  <div class="col-md-6 text-end">
                      <button class="btn btn-success btn-sm" id="abrir-modal" data-bs-toggle="modal" data-bs-target="#modal-registro-articulos"><i class="bi bi-plus-circle-fill"></i> Agregar artículos</button>
                  </div>
              </div>
          </div>
          <div class="card-body">
            <table class="table table-sm table-stripped" id="tabla-articulos">
              <colgroup>
                <col width = "10%">
                <col width = "30%">
                <col width = "30%">
                <col width = "30%">
                <col width = "10%">
              </colgroup>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Grupo</th>
                  <th>Cod.producto</th>
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
    <div class="modal fade" id="modal-registro-articulos" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-title">Registrar artículos</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="formulario-articulos" autocomplete="off">
              <div class="mb-3">
                <label for="codigog" class="form-label">Grupo</label>
                <select name="codigog" id="codigog" class="form-select form-select-sm">
                  <option value="">Seleccione</option>
                </select>
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
    
    
    <!-- Optional: Place to the bottom of scripts -->
    
    </script>
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

        let datosNUevos = true;
        let idarticuloactualizar = -1;

        function obtenerGupos(){
          $.ajax({
            url : '../controllers/articulo.controller.php',
            tye : 'POST',
            data : {operacion : 'listado'},
            dataType: 'text',
            success : function(result){
              $("#codigog").html(result);
            }
          });
        }
        
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
            let datosNuevos = {
              url : '../controllers/articulo.controller.php',
              idarticulo  : idarticuloactualizar,
              codigoa     : $("#codigoa").val(),
              descripcion : $("#descripcion").val(),
            }
          }       
        }

        function abrirModal(){

          datosNuevos = true;
          $("#modal-title").html("Registro de artículos");
          $("#formulario-articulos")[0].reset();
        }
        $("#guardar-articulos").click(registrarArticulos);
        $("#abrir-modal").click(abrirModal);
      mostrarArticulos()
    });
    </script>
  </body>
</html>