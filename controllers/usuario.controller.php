<?php

require_once '../models/Usuario.php';

if(isset($_POST['operacion'])){

    $usuario = new Usuario();
    
    if($_POST['operacion'] == 'login'){
        
    }
}