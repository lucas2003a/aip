<?php

require_once '../models/Articulo.php';

if(isset($_POST['operacion'])){
    
    $articulo = new Articulo();

    if($_POST['operacion'] == 'listar'){
    
        $data = $articulo->listarArticulos();
    
        if($data){

            $numeroFila=1;
            $datosArticulo = '';

            foreach($data as $registro){

                $datosArticulo = $registro['codigog'].' '. $registro['codigoa'];

                echo "
                    <tr>
                        <td>{$numeroFila}</td>
                        <td>{$registro['codigog']}</td>
                        <td>{$registro['codigoa']}</td>
                        <td>{$registro['descripcion']}</td>
                        <td>
                            <a href='#' data-idarticulo='{$registro['idarticulo']}' class='btn btn-danger btn-sm eliminar'><i class='bi bi-trash3'></i></a>
                            <a href='#' data-idarticulo='{$registro['idarticulo']}' class='btn btn-info btn-sm editar'><i class='bi bi-pencil'></i></a>
                        </td>
                    </tr>
                ";

                $numeroFila++;
            }
        }    
    }


    //revisar el procedimieto almacenado, porque no funciona
    if($_POST['operacion'] == 'listado'){

        $data = $articulo->listadoArticulos($_POST['idgrupo']);

        if($data){
            echo "<option value='' selected>Seleccione</option>";

            foreach($data as $registro){
                echo "<option value='{$registro['idarticulo']}'>{$registro['codigoa']}</option>";
            }
        }else{
            echo "<option value=''>No encontramos registros</option>";
        }
    }

    if($_POST['operacion'] == 'registrar'){
        
        $datosForm = [

            "idgrupo"       => $_POST['idgrupo'],
            "codigoa"       => $_POST['codigoa'],
            "descripcion"   => $_POST['descripcion']
        ];

        $articulo->registrarArticulos($datosForm);
    }

    if($_POST['operacion'] == 'actualizar'){

        $datosForm = [
            "idarticulo"    => $_POST['idarticulo'],
            "idgrupo"       => $_POST['idgrupo'],
            "codigoa"       => $_POST['codigoa'],
            "descripcion"   => $_POST['descripcion']       
        ];

        $articulo->actualizarArticulos($datosForm);
    }

    if($_POST['operacion'] == 'eliminar'){
        $articulo->eliminarArticulos($_POST['idarticulo']);
    }

    if($_POST['operacion'] == 'obtenerarticulo'){
        $registro = $articulo->obtenerArticulos($_POST['idarticulo']);
        echo json_encode($registro);
    }
}