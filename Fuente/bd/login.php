<?php

session_start();

include_once 'conexion.php';

$object = new Conexion();
$conection = $object->conectar();

$user = (isset($_POST['user'])) ? $_POST['user'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$consult = "SELECT * FROM users WHERE user = '$user' AND password = '$password'";
$result = $conection->prepare($consult);
$result->execute();

if ( $result->rowCount() >= 1 ) {
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["s_user"] = $user;
} else {
    $_SESSION["s_user"] = null;
    $data = null;
}

print json_encode($data);

$conection = null;
