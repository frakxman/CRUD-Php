<?php

include ('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM usuarios WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $cumpleaños = $row['cumpleaños'];
        $genero = $row['genero'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cumpleaños = $_POST['cumpleaños'];
    $genero = $_POST['genero'];

    $query = "UPDATE usuarios set nombre = '$nombre', apellido = '$apellido', cumpleaños = '$cumpleaños', genero = '$genero' WHERE id = $id";
    mysqli_query($conn, $query);

    header("Location: index.php");
}

?>

<?php include("include/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-grop">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Actualiza el nombre">
                    </div>
                    <div class="form-grop">
                        <input type="text" name="apellido" value="<?php echo $apellido; ?>" class="form-control" placeholder="Actualiza el apellido">
                    </div>
                    <div class="form-grop">
                        <input type="text" name="cumpleaños" value="<?php echo $cumpleaños; ?>" class="form-control" placeholder="Actualiza el cumpleaños">
                    </div>
                    <div class="form-grop">
                        <input type="text" name="genero" value="<?php echo $genero; ?>" class="form-control" placeholder="Actualiza el genero">
                    </div>
                    <button class="btn btn-success btn-block mt-3" name="update">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("include/footer.php") ?>