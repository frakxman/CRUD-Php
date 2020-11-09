<?php

    include ('db.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM usuarios WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if ( !$result ) {
            die("Query Failed");
        }

        $_SESSION['message'] = 'Usuario Borrado Correctamente';

        header("Location: index.php");
    }