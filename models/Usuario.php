<?php

require_once 'Conexion.php';

class Usuario extends Conexion{

    private $accesoBD;

    public function __construct(){
        $this->accesoBD = parent::getConexion();
    }

    public function iniciarSesion($nusuario = ""){
        try{
            $consulta = $this->accesoBD->prepare("call spu_usuarios_login(?)");
            $consulta->execute(array($nusuario));

            return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function registrarUsuario($datos = []){
        try{
            $consulta = $this->accesoBD->prepare("call spu_usuarios_registrar(?,?,?,?)");
            $consulta->execute(
                array(
                    $datos["nombres"],
                    $datos["apellidos"],
                    $datos["nusuario"],
                    $datos["claveacceso"]
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}