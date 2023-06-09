<?php

session_start();

require_once '../models/Usuario.php';

if(isset($_POST['operacion'])){

    $usuario = new Usuario();
    
    if($_POST['operacion'] == 'login'){
        
        $registro = $usuario->iniciarSesion($_POST['nusuario']);
        $_SESSION["login"] = false;

        //objeto que contiene el resultado

        $resultado =[
            "status"  => false,
            "mensaje" => ""
        ];

        if($registro){

            //el usuario si existe

            $claveEncriptada = $registro["claveacceso"];

            //validar la contraseña
            if(password_verify($_POST['claveingresada'],$claveEncriptada)){
                $resultado["status"] = true;
                $resultado["mensaje"] = "Bienvenido al sistema";
                $_SESSION["login"] = true;
            }else{
                $resultado["mensaje"] = "No existe la contraseña";
            }
        }else{

            //el usuario no existe
            $resultado["mensaje"] = "No enconstramos el usuario";
        }

        // enviamos el objeto $resultado a la vista
        echo json_encode($resultado);
    }

    if($_POST['operacion'] == 'registrar'){

        $datosForm = [
            "nombres"   => $_POST['nombres'],
            "apellidos" => $_POST['apellidos'],
            "nusuario"  => $_POST['nusuario'],
            "claveacceso" => password_hash($_POST['claveacceso'],PASSWORD_BCRYPT),
        ];

        $usuario->registrarUsuario($datosForm);
    }
}

if(isset($_GET['operacion'])){

    if($_GET['operacion'] == 'finalizar'){
        session_destroy();
        session_unset();
        header('Location:../index.php');
    }
}