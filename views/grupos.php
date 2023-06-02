<?php
?>
<!doctype html>
<html lang="es">
  <head>
    <title>AIP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--iconos de  bottstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

  </head>
  <body>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-primary text-light">
                <div class="row">
                    <div class="col-md-6">
                        <strong>Lista de grupos</strong>
                    </div>
                    <div class="col-md-6 text-end">
                        <button class="btn btn-success btn-sm" id="abrir-modal" data-bs-toggle="modal" data-bs-target="#modal-registro-grupos"><i class="bi bi-plus-circle-fill"></i> Agregar grupos</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped" id="tabla-grupos">
                    <colgroup>           
                        <col width = "20%">
                        <col width = "35%">
                        <col width = "35%">
                        <col width = "10%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Código</th>
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
    <!-- Button trigger modal -->
    
    <!-- Modal -->
    <div class="modal fade" id="modal-registro-grupos" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Registro de grupos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formulario-grupos" autocomplete="off">
                        <div class="mb-3">
                            <label for="codigog" class="form-label">Código</label>
                            <input type="text" class="form-control form-control-sm" id="codigog">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control form-control-sm" id="descripcion">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="guardar-grupos">Guardar</button>
                </div>
            </div>
        </div>
    </div>
        
    <!-- Optional: Place to the bottom of scripts -->
    
    
    </script>
    <!--fin zona de modales-->
    
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
        $(document).ready(function (){

            //VARABLES DEL ÁMBITO GENERAL (ACCESIBLES)
            let datosNuevos = true;
            let idgrupoactualizar = -1;

            function mostrarGrupos(){
                $.ajax({
                    url: '../controllers/grupo.controller.php',
                    type: 'POST',
                    data: {operacion:'listar'},
                    dataType:'text',
                    success: function(result){
                        $("#tabla-grupos tbody").html(result);
                    } 
                });
            }

            function registrarGrupos(){

                if(confirm("¿Seguro de salvar los datos?")){

                    let datos ={
                        operacion : 'registrar',
                        idgrupo   : idgrupoactualizar,
                        codigog   : $("#codigog").val(),
                        descripcion : $("#descripcion").val()
                    };

                    if(!datosNuevos){
                        datos["operacion"] = "actualizar";
                    }
                    
                    $.ajax({
                        url: '../controllers/grupo.controller.php',
                        type: 'POST',
                        data: datos,
                        success : function(result){
                            if(result == ""){
                                $("#formulario-grupos")[0].reset();

                                mostrarGrupos();

                                $("#modal-registro-grupos").modal('hide');
                            }
                        }
                    });
                }
            }

            function abrirModal(){
                datosNuevos = true;
                $("#modalTitleId").html("registros de grupos");
                $("#formulario-grupos")[0].reset();
            }
            
            $("#guardar-grupos").click(registrarGrupos);
            $("#abrir-modal").click(abrirModal);

            $("#tabla-grupos tbody").on("click",".eliminar",function(){
                const idgrupoEliminar = $(this).data("idgrupo");
                if(confirm("¿Seguro de eliminar el grupo?")){
                    $.ajax({
                        url : '../controllers/grupo.controller.php',
                        type : 'POST',
                        data :{
                            operacion : 'eliminar',
                            idgrupo : idgrupoEliminar
                        },
                        success : function(result){
                            if(result == ""){
                                mostrarGrupos();
                            }
                        }
                    });
                }           
            });

            $("#tabla-grupos tbody").on("click",".editar",function(){
                const idgrupoEditar = $(this).data("idgrupo");

                $.ajax({
                    url : '../controllers/grupo.controller.php',
                    type : 'POST',
                    data : {
                        operacion : 'obtenergrupo',
                        idgrupo : idgrupoEditar
                    },
                    dataType :'JSON',
                    success : function(result){
                        console.log(result);

                        datosNuevos = false;

                        idgrupoactualizar = result['idgrupo'];
                        $("#codigog").val(result["codigog"]);
                        $("#descripcion").val(result["descripcion"]);

                        $("#modalTitleId").html("Actualizar datos de grupos");
                        
                        $("#modal-registro-grupos").modal("show");
                    }
                });
            });

            mostrarGrupos();
        });
    </script>
  </body>
</html>