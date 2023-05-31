<?php

require_once 'Conexion.php';

class Articulo extends Conexion{

    private $accesoBD;

    public function __construct()
    {
        $this->accesoBD = parent::getConexion();
    }

    public function listarArticulos(){
        try{
            $consulta = $this->accesoBD->prepare("call spu_listar_articulos");
            $consulta->execute();

            return $consulta->fetchall(PDO::FETCH_ASSOC);    
        }

        catch(Exception $e){
            die($e->getMessage());
        }
    }

<<<<<<< HEAD
    public function listadoArticulos($idgrupo = 0){
        try{
            $consulta = $this->accesoBD->prepare("call spu_obtener_Articulo(?)");
            $consulta->execute(array($idgrupo));
            
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }

        catch(Exception $e){
            die($e->getMessage());
        }
    }

=======
>>>>>>> 02d246ce1e2d002abd7f5a5b4263080cb597d389
    public function registrarArticulos($datos = []){
        try{
            $consulta = $this->accesoBD->prepare("spu_insertar_articulos(?,?,?)");
            $consulta->execute(
                array(
                    $datos['idgrupo'],
                    $datos['codigoa'],
                    $datos['descripcion']
                )
            );
        }

        catch(Exception $e){
            die($e->getMessage());
        }
    }
}