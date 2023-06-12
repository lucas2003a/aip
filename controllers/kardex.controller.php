<?php

require_once '../models/Kardex.php';

if(isset($_POST['operacion'])){

    $kardex = new Kardex();

    if($_POST['operacion'] == 'listar'){

        $data = $kardex->listarKardex();

        if($data){

            $numeroFila = 1;
            $datosKardex = "";

            foreach($data as $registro){

                $datosKardex = $registro['codigoa'] .' '.$registro['fecha_hora'];

                echo "
                    <tr>
                        <td>{$numeroFila}</td>
                        <td>{$registro['codigoa']}</td>
                        <td>{$registro['fecha_hora']}</td>
                        <td>{$registro['ingreso']}</td>
                        <td>{$registro['salida']}</td>
                        <td>{$registro['saldo']}</td>
                        <td>{$registro['concepto']}</td>
                        <td>{$registro['detalle']}</td>
                        <td>{$registro['encargado']}</td>
                        <td>
                            <a href='#' data-idkardex='{$registro['idkardex']}' class='btn btn-sm btn-danger eliminar'><i class='bi bi-trash3'></i></a>
                            <a href='#' data-idkardex='{$registro['idkardex']}' class='btn btn-sm btn-info editar'><i class='bi bi-pencil'></i></a>
                        </td>
                    </tr>
                ";
                $numeroFila++;
            }
        }
        
    }

    if($_POST['operacion'] == 'obtenerdescrip'){

        $data = $kardex->recuperarDescrip($_POST['idarticulo']);

        if($data){
            echo "<option value='' selected>Seleccione</option>";

            foreach($data as $registro){
                echo "<option value='{$registro['idarticulo']}'>{$registro['descripcion']}</option>";
            }
        }else{
            echo "<option value=''>No encontramos registros</option>";
        }
    }

    if($_POST['operacion']=='registrar'){

        $datosForm = [
            "idarticulo"    =>  $_POST['idarticulo'],
            "fecha_hora"    =>  $_POST['fecha_hora'],
            "ingreso"       =>  $_POST['ingreso'],
            "salida"        =>  $_POST['salida'],
            "saldo"         =>  $_POST['saldo'],
            "concepto"      =>  $_POST['concepto'],
            "detalle"       =>  $_POST['detalle'],
            "encargado"     =>  $_POST['encargado']
        ];

        $kardex->registrarKardex($datosForm);
    }

    if ($_POST['operacion'] == 'actualizar'){

        $datosForm = [        
            "idkardex"      =>  $_POST['idkardex'],
            "idarticulo"    =>  $_POST['idarticulo'],
            "fecha_hora"    =>  $_POST['fecha_hora'],
            "ingreso"       =>  $_POST['ingreso'],
            "salida"        =>  $_POST['salida'],
            "saldo"         =>  $_POST['saldo'],
            "concepto"      =>  $_POST['concepto'],
            "detalle"       =>  $_POST['detalle'],
            "encargado"     =>  $_POST['encargado']
        ];

        $kardex->actualizarKardex($datosForm);

    }

    if($_POST['operacion'] == 'obtenerkardex'){
        $registro = $kardex->obtenerKardex($_POST['idkardex']);
        echo json_encode($registro);
    }

    if($_POST['operacion'] == 'eliminar'){
        $registro = $kardex->eliminarKardex($_POST['idkardex']);
    }
}