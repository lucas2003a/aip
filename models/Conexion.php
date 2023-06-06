<?php

class Conexion{
    private $host = '66.152.176.245';    //SERVIDOR
    private $port = '3306';         //PUERTO DE CONEXION BD
    private $database = 'aip';      // NOMBRE BD
    private $charset = 'UTF8';      //CODIFICACION (IDIOMA)
    private $user = 'admin';         //USUARIO (IDIOMA)
    private $password = '160770';         //CONTRASEÑA

    //atributo (instancia PDO) que almmacena el objeto
    private $pdo;

    //METODO 1: ACCEDERA LA BASE DE DATOS
    private function conectarServidor(){
        //CONTRUCTOR:
        //new PDO("CADENA_CONEXION","USER","PASSWORD");
        $conexion = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->database};charset={$this->charset}",$this->user,$this->password);
        return $conexion;
    }

    //METODO 2:RETOTNA EL ACCESO
    public function getConexion(){
        try{
            //PARAMETROS PRA LA CONEXION AL ATRIBUTO/OBETO $pdo
            $this->pdo = $this->conectarServidor();

            //CONTROLAR LOS ERRORES(los errores serán cotrolados por TRY-CATCH)
            $this->pdo->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            //RETORNAMOS LA CONEXION AL MODELO QUE LO NECESITE
            return $this->pdo;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}