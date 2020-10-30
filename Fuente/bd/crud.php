<?php

include 'conexion.php';
$object = new Conexion();
$conection = $object->conectar();

$name = (isset($_POST['name'])) ? $_POST['name'] :  "";
$lastName = (isset($_POST['lastName'])) ? $_POST['lastName'] :  "";
$birthday = (isset($_POST['birthday'])) ? $_POST['birthday'] :  "";
$gender = (isset($_POST['gender'])) ? $_POST['gender'] :  "";
$user = (isset($_POST['user'])) ? $_POST['user'] :  "";
$password = (isset($_POST['password'])) ? $_POST['password'] :  "";
$id = (isset($_POST['id'])) ? $_POST['id'] :  "";
$option = (isset($_POST['option'])) ? $_POST['option'] :  "";

switch ($option) {
    case '1': //Nuevo
        $consult = "INSERT INTO users ( name, lastName, birthday, gender, user, password ) VALUES ( '$name', '$lastName', '$birthday', '$gender', '$user', '$password' )";
        $result = $conection->prepare($consult);
        $result->execute();

        $consult = "SELECT id, name, lastName, birthday, gender, user, password FROM users ORDER BY id DESC LIMIT 1";
        $result = $conection->prepare($consult);
        $result->execute();
        $data = $result->fetchALL(PDO::FETCH_ASSOC);
        break;
    case '2': //Modificación
        $consult = "UPDATE users SET name = '$name', lastName = '$lastName', birthday = '$birthday', gender = '$gender', user = '$user', password = '$password' WHERE id = '$id' ";
        $result = $conection->prepare($consult);
        $result->execute();

        $consult = "SELECT id, name, lastName, birthday, gender, user, password FROM users ORDER BY id DESC LIMIT 1";
        $result = $conection->prepare($consult);
        $result->execute();
        $data = $result->fetchALL(PDO::FETCH_ASSOC);
        break;
    case '3': //Eliminación
        $consult = "DELETE FROM users WHERE id = '$id' ";
        $result = $conection->prepare($consult);
        $result->execute();
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);
$conection = null;
