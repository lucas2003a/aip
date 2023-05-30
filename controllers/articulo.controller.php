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
                $numeroFila;

            }
        }    
    }

    if($_POST['operacion'] == 'insertar'){
        
        $datosForm = [

            "idgrupo"       => ['idgrupo'],
            "codigoa"       => ['codigoa'],
            "descripcion"   => ['descripcion'],
        ];

        $articulo->registrarArticulos($datosForm);
    }
}