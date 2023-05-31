<?php

require_once '../models/Articulo.php';

if(isset($_POST['operacion'])){
    
    $articulo = new Articulo();

    if($_POST['operacion'] == 'listar'){
    
        $data = $articulo->listarArticulos();
    
        if($data){

            $numeroFila=1;

            foreach($data as $registro){

                $datosArticulo = $registro['codigoa'].' '. $registro['descripcion'];

                echo "
                    <tr>
                        <td>{$numeroFila}</td>
                        <td>{$registro['codigoa']}</td>
                        <td>{$registro['descripcion']}</td>
                        <td>
                            <a href='#' data-idarticulo='{$registro['idarticulo']}' class='btn btn-danger btn-sm eliminar'><i class='bi bi-trash3'></i></a>
                            <a href='#' data-idarticulo='{$registro['idarticulo']}' class='btn btn-info btn-sm editar'><i class='bi bi-pencil'></i></a>
                        </td>
                    </tr>
                ";
<<<<<<< HEAD
                $numeroFila++;
=======
                $numeroFila;
>>>>>>> 02d246ce1e2d002abd7f5a5b4263080cb597d389

            }
        }    
    }

<<<<<<< HEAD
    //revisar el procedimieto almacenado, porque no funciona
    if($_POST['operacion'] == 'listado'){

        $data = $articulo->listadoArticulos($_POST['idgrupo']);

        if($data){
            echo "<option value='' selected>Seleccione</option>";

            foreach($data as $registro){
                echo "<option value='{$registro['idgrupo']}'>{$registro['codigog']}</option>";
            }
        }else{
            echo "<option value=''>No encontramos registros</option>";
        }
    }

=======
>>>>>>> 02d246ce1e2d002abd7f5a5b4263080cb597d389
    if($_POST['operacion'] == 'insertar'){
        
        $datosForm = [

            "idgrupo"       => ['idgrupo'],
            "codigoa"       => ['codigoa'],
            "descripcion"   => ['descripcion'],
        ];

        $articulo->registrarArticulos($datosForm);
    }
}