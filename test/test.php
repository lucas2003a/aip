<?php

$claveU = '2023';

$claveMD5 = md5($claveU);
$claveSHA = sha1($claveU);
$claveHash = password_hash($claveU,PASSWORD_BCRYPT);

$claveA = "2023";

var_dump($claveHash);