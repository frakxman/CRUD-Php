<?php

include 'db.php';

if ( isset($_POST['save_users'])) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cumpleanos = $_POST['cumpleanos'];
    $genero = $_POST['genero'];

    $query = "INSERT INTO usuarios ( nombre, apellido, cumpleaños, genero) VALUES ( '$nombre', '$apellido', '$cumpleanos', '$genero' )";
    $result = mysqli_query( $conn, $query );
    if ( !$result ) {
        die("Query Failed");
    } 

    $_SESSION['message'] = 'Nuevo usuario registrado';
    $_SESSION['message_type'] = 'success';

    header("location: index.php");
}