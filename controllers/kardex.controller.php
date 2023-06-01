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
                    </tr>
                ";
            }
        }
    }
}