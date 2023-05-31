<?php

require_once '../models/Grupo.php';

if(isset($_POST['operacion'])){
    
    $grupo = new Grupo();

    if ($_POST['operacion'] == 'listar'){

        $data = $grupo->listarGrupos();

        if($data){

            $numeroFila=1;
            /*$datosEstudiante='';
            $botonNulo="<a href='#' class='btn btn-sm btn-warning' title='no hay documento'><i class='bi bi-eye-slash-fill'></i></a>";*/
            
            foreach($data as $registro){

                $datosGrupo = $registro['codigog'] .' '. $registro['descripcion'];

                echo"
                    <tr>
                        <td>{$numeroFila}</td>
                        <td>{$registro['codigog']}</td>
                        <td>{$registro['descripcion']}</td>
                        <td>
                            <a href='#' data-idgrupo='{$registro['idgrupo']}' class='btn btn-danger btn-sm eliminar'><i class='bi bi-trash3'></i></a>
                            <a href='#' data-idgrupo='{$registro['idgrupo']}' class='btn btn-info btn-sm editar'><i class='bi bi-pencil'></i></a>
                        </td>
                    </tr>
                ";
                $numeroFila++;
            }
        }
    }

    if($_POST['operacion'] == 'listado'){

        $data = $grupo->listarGrupos();

        if($data){

            echo"<option value='' selected>Seleccione</option>";
            foreach($data as $registro){
                echo"option value='{$registro['idgrupo']}'>{$registro['codigog']}</option>";
            }
        }else{
            echo"<option value=''>No encontramos resultados</option>";
        }
    }

    if($_POST['operacion']=='registrar'){
        
        $datosForm = [
            "codigog"       => $_POST['codigog'],
            "descripcion"   => $_POST['descripcion']
        ];

        $grupo->registrarGrupos($datosForm);
    }

    if($_POST['operacion']=='actualizar'){

        $datosForm = [
            "idgrupo"   => $_POST['idgrupo'],
            "codigog"   => $_POST['codigog'],
            "descripcion" => $_POST['descripcion']
        ];

        $grupo->actualizarGrupos($datosForm);
    }

    if($_POST['operacion'] == 'eliminar'){
        $grupo->eliminarGrupos($_POST['idgrupo']);
    }

    if($_POST['operacion'] == 'obtenergrupo'){
        $registro = $grupo->obtenerGrupos($_POST['idgrupo']);
        echo json_encode($registro);
    }
}