<?php

session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == false){
    header('Location:../index.php');
}
?>
<style>
  .gradient-custom {
    background:#6a11cb ;
    
    background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

    background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
  }

</style>

<!doctype html>
<html lang="es">

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
        <section class="vh gradient-custom">
            <div class="container pt-3 h-100">
                <nav class="nav nav-tabs flex-column">
                <a class="nav-link text-light" href="articulos.php">Articulos</a>
                <a class="nav-link text-light" href="grupos.php">Grupos</a>
                <a class="nav-link text-light" href="kardex.php">Kardex</a>
            </nav>
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        <div class="row">
                            <div class="col-md-6">
                                <h1><strong>Kardex</strong></h1>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="../controllers/usuario.controller.php?operacion=finalizar" style="text-decoration: none;" class="btn btn-danger btn-sm"><i class="bi bi-box-arrow-left">Cerrar sesión</i></a>
                                <button class="btn btn-success btn-sm" id="abrir-modal" data-bs-toggle="modal" data-bs-target="#modal-registro-kardex"><i class="bi bi-plus-circle-fill"></i> Agregar otro registro</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-sm" id="tabla-kardex">
                            <colgroup>
                                <col width = "5%">
                                <col width = "10%">
                                <col width = "15%">
                                <col width = "5%">
                                <col width = "5%">
                                <col width = "5%">
                                <col width = "15%">
                                <col width = "15%">
                                <col width = "20%">
                                <col width = "5%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cod.articulo</th>
                                    <th>Fecha y hora</th>
                                    <th>Ingreso</th>
                                    <th>Salida</th>
                                    <th>Saldo</th>
                                    <th>Concepto</th>
                                    <th>Detalle</th>
                                    <th>Encargado</th>
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
            <div class="modal fade modal" id="modal-registro-kardex" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                            <div class="modal-header bg-primary text-light">
                                    <h5 class="modal-title" id="modalTitleId">Registrar kardex</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        <div class="modal-body">
                            <form id="formulario-kardex" autocomplete="off">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <label for="codigog" class="form-label">Código de grupo</label>
                                        <select name="codigog" id="codigog" class="form-select form-select-sm">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <label for="codigoa" class="form-label">Código de artículo</label>
                                        <select name="codigoa" id="codigoa" class="form-select form-select-sm">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="articulo" class="form-label">Artículo</label>
                                        <select name="articulo" id="articulo" class="form-select form-select-sm">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label for="ingreso" class="form-label">Ingreso</label>
                                        <input type="number" name="ingreso" id="ingreso" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="salida" class="form-label">Salida</label>
                                        <input type="number" name="salida" id="salida" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="saldo" class="form-label">Saldo</label>
                                        <input type="number" name="saldo" id="saldo" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="concepto" class="form-label">Concepto</label>
                                        <input type="text" name="concepto" id="concepto" class="form-control form-control-sm" maxlength="40">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="detalle" class="form-label">Detalle</label>
                                        <input type="text" name="detalle" id="detalle" class="form-control form-control-sm" maxlength="40">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="encargado" class="form-label">Encargado</label>
                                        <input type="text" name="encargado" id="encargado" class="form-control form-control-sm" maxlength="40">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="fecha_hora" class="form-label">Fecha</label>
                                        <input type="date" name="fecha_hora" id="fecha_hora" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="guardar-kardex">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            
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
                let idkardexactualizar = -1;

                function obtenerGrupo(){
                    $.ajax({
                        url : '../controllers/grupo.controller.php',
                        type : 'POST',
                        data : {operacion : 'listado'},
                        success : function(result){
                            $("#codigog").html(result);
                        }
                    });
                }

                /*function obtenerCodarti(){
                    $.ajax({
                        url : '../controllers/articulo.controller.php',
                        type : 'POST',
                        data : {operacion : 'listado'},
                        success : function(result){
                            $("#codigoa").html(result);
                        }
                    });
                }*/

                $("#codigog").change(function(){
                    const idgrupoFiltro = $(this).val();

                    $.ajax({
                        url : '../controllers/articulo.controller.php',
                        type : 'POST',
                        data : {
                            operacion : 'listado',
                            idgrupo : idgrupoFiltro
                        },
                        dataType : 'text',
                        success : function(result){
                            $("#codigoa").html(result);
                        }
                    });
                });

                $("#codigoa").change(function(){
                    const idarticuloFiltrar = $(this).val();

                    $.ajax({
                        url : '../controllers/kardex.controller.php',
                        type : 'POST',
                        data : {
                            operacion : 'obtenerdescrip',
                            idarticulo : idarticuloFiltrar
                        },
                        dataType : 'text',
                        success : function(result){
                            $("#articulo").html(result);
                        }
                    });
                });
                
                function mostrarKardex(){
                  $.ajax({
                    url : '../controllers/kardex.controller.php',
                    type : 'POST',
                    data : {operacion : 'listar'},
                    success : function(result){
                        $("#tabla-kardex tbody").html(result);
                    }
                  }) ; 
                }

                function registrarKardex(){
                    if(confirm("¿desea guardar el registo?")){
                        let datos = {
                            operacion   :   'registrar',
                            idkardex    :   idkardexactualizar,
                            idarticulo  :   $("#codigoa").val(),
                            fecha_hora  :   $("#fecha_hora").val(),
                            ingreso     :   $("#ingreso").val(),
                            salida      :   $("#salida").val(),
                            saldo       :   $("#saldo").val(),
                            concepto    :   $("#concepto").val(),
                            detalle     :   $("#detalle").val(),
                            encargado   :   $("#encargado").val()          
                        };

                        if(!datosNuevos){
                            datos["operacion"] = "actualizar";
                        }

                        $.ajax({
                            url : '../controllers/kardex.controller.php',
                            type : 'POST',
                            data : datos,
                            success : function(result){
                                if(result == ""){
                                    $("#formulario-kardex")[0].reset();

                                    mostrarKardex();

                                    /*"#modal-registro-kardex", es el id del modal que se establece en la linea 78 en el segundo atributo:
                                    <div class="modal fade" id="modal-registro-kardex" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">*/     
                                    $("#modal-registro-kardex").modal('hide');
                                }
                            }
                        })
                    }
                }
                function abrirModal(){
                    datosNuevos = true;
                    $("#modalTitleId").html("Registrar Kardex");
                    $("#formulario-kardex")[0].reset();
                }
                $("#guardar-kardex").click(registrarKardex);
                $("#abrir-modal").click(abrirModal);

                $("#tabla-kardex tbody").on("click",".editar",function(){
                    const idkardexeditar = $(this).data("idkardex");
                    
                    $.ajax({
                        url     : '../controllers/kardex.controller.php',
                        type    : 'POST',
                        data    : {
                            operacion   : 'obtenerkardex',
                            idkardex    : idkardexeditar,
                        },
                        dataType    : 'JSON',
                        success     : function(result){
                            console.log(result);

                            datosNuevos = false;

                            idkardexactualizar = result['idkardex'];
                            $("#codigoa").val(result["idarticulo"]);
                            $("#fecha_hora").val(result["fecha_hora"]);
                            $("#ingreso").val(result["ingreso"]);
                            $("#salida").val(result["salida"]);
                            $("#saldo").val(result["saldo"]);
                            $("#concepto").val(result["concepto"]);
                            $("#detalle").val(result["detalle"]);
                            $("#encargado").val(result["encargado"]);

                            $("#modalTitleId").html("Actualizar kardex");

                            $("#modal-registro-kardex").modal("show");
                        }
                    });
                });

                $("#tabla-kardex tbody").on("click",".eliminar",function(){
                    const idkardexeliminar = $(this).data("idkardex");
                    if(confirm("¿Desea eliminar el registro?")){
                        $.ajax({
                            url     :   '../controllers/kardex.controller.php',
                            type    :   'POST',
                            data    :{
                                operacion   :   'eliminar',
                                idkardex    :   idkardexeliminar
                            }, 
                            success :   function(result){
                                if(result == ""){
                                    mostrarKardex();
                                }
                            } 
                        });
                    }
                });

                $("#modal-registro-kardex").on("show.bs.modal",event => {
                    $("#codigog").focus();
                    
                    //obtenerCodarti();
                    obtenerGrupo();
                });

            mostrarKardex();
            });
        </script>
    </body>

</html>