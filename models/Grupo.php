<?php

require_once 'Conexion.php';

class Grupo extends Conexion{

    private $accesoBD;

    public function __construct()
    {
        $this->accesoBD = parent::getConexion();
    }

    public function listarGrupos(){
        try{
            $consulta = $this->accesoBD->prepare("call spu_listar_grupos()");
            $consulta->execute();

            return $consulta->fetchall(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function registrarGrupos($datos = []){

        try{
            $consulta = $this->accesoBD->prepare("call spu_insertar_grupos(?,?)");
            $consulta->execute(
                array(
                    $datos['codigog'],
                    $datos['descripcion']
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function actualizarGrupos($datos = []){

        try{

            $consulta = $this->accesoBD->prepare("call spu_modificar_grupos(?,?,?)");
            $consulta->execute(
                array(
                    $datos['idgrupo'],
                    $datos['codigog'],
                    $datos['descripcion']
                )
            );
        }

        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function eliminarGrupos($idgrupo = 0){
        try{
            $consulta = $this->accesoBD->prepare("call spu_eliminar_grupos(?)");
            $consulta->execute(array($idgrupo));
        }
        
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function obtenerGrupos($idgrupo = 0){
        try{
            $consulta = $this->accesoBD->prepare("call spu_recuperar_grupos(?)");
            $consulta->execute(array($idgrupo));

            return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

}