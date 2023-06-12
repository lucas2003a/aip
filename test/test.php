<?php

$claveU = '2023';

$claveMD5 = md5($claveU);
$claveSHA = sha1($claveU);
$claveHash = password_hash($claveU,PASSWORD_BCRYPT);

$claveA = "2023";

var_dump($claveHash);

/*no hagas el procedimiento almacenado para insertar o modificar un registro con una columna calculada
phpmyadmin ingnora el valor si se inserta, y esto genera un error en 000webhost*/

/*revisa el inspector del navegador, los procesos los verifique en la pestaña Network que se encuentra 
en el inspector del navegador, allí se observan todos los procesos que se va ejecutando con cada acción
y eso facilita el seguimiento para encontrar errores*/