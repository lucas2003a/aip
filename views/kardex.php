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
                            <strong>Kardex</strong>
                        </div>
                        <div class="col-md-6 text-end">
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
        <div class="modal fade" id="modal-kardex" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">Registrar kardex</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <div class="modal-body">
                        <form id="formulario-kardex" autocomplete="off">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="codigog" class="form-label">Código de grupo</label>
                                    <select name="codigog" id="codigog" class="form-select form-select-sm">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="codigoa" class="form-label">Código de artículo</label>
                                    <select name="codigoa" id="codigoa" class="form-select form-select-sm">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="articulo" class="form-label">Artículo</label>
                                    <input type="text" class="form-control form-control-sm" id="articulo" readonly>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        
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

                function abrirModal(){
                    datosNuevos = true;
                    $("#modalTitleId").html("Registrar Kardex");
                    $("#formulario-kardex")[0].reset();
                }
                $("#abrir-modal").click(abrirModal);
            });
        </script>
    </body>

</html>