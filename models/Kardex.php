<?php

require_once 'Conexion.php';

class Kardex extends Conexion{

    private $accesoBD;

    public function __construct()
    {
        $this->accesoBD = parent::getConexion(); 
    }

    public function listarKardex(){
        try{
            $consulta = $this->accesoBD->prepare("call spu_listar_kardex()");
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }

        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function registrarKardex($datos = []){
        try{
            $consulta = $this->accesoBD->prepare("call spu_insertar_kardex(?,?,?,?,?,?,?)");
            $consulta->execute(
                array(
                    $datos["idarticulo"],
                    $datos["fecha_hora"],
                    $datos["ingreso"],
                    $datos["salida"],
                    $datos["concepto"],
                    $datos["detalle"],
                    $datos["encargado"]
                )
            );
        }

        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function actualizarKardex($datos = []){
        try{
            $consulta = $this->accesoBD->prepare("call spu_modificar_kardex(?,?,?,?,?,?,?,?)");
            $consulta->execute(
                array(
                    $datos["idkardex"],
                    $datos["idarticulo"],
                    $datos["fecha_hora"],
                    $datos["ingreso"],
                    $datos["salida"],
                    $datos["concepto"],
                    $datos["detalle"],
                    $datos["encargado"]
                )
            );    
        }

        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function obtenerKardex($idkardex = 0){
        try{
            $consulta = $this->accesoBD->prepare("call spu_recuperar_kardex(?)");
            $consulta->execute(array($idkardex));

            return $consulta->fetch(PDO::FETCH_ASSOC);
        }

        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function recuperarDescrip($idarticulo = 0){
        try{
            $consulta = $this->accesoBD->prepare("call spu_recuperar_descripciona(?)");
            $consulta->execute(array($idarticulo));

            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }

        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function eliminarKardex($idkardex = 0){
        try{
            $consulta = $this->accesoBD->prepare("call spu_eliminar_kardex(?)");
            $consulta->execute(array($idkardex));
        }

        catch(Exception $e){
            die($e->getMessage());
        }
    }
}