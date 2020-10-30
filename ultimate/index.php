<?php

include 'db.php';
?>

<?php include("include/header.php")?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-body mt-3">
                    <form action="save_users.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre"><br>
                            <input type="text" name="apellido" class="form-control" placeholder="Apellido"><br>
                            <input type="text" name="cumpleanos" class="form-control" placeholder="Cumpleaños"><br>
                            <input type="text" name="genero" class="form-control" placeholder="Género"><br>
                            <input type="submit" class="btn btn-success btn-block mb-2" name="save_users" value="Añadir">
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cumpleaños</th>
                            <th>G&eacute;nero</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM usuarios";
                            $results = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($results)) { ?>
                            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['nombre']?></td>
                                <td><?php echo $row['apellido']?></td>
                                <td><?php echo $row['cumpleaños']?></td>
                                <td><?php echo $row['genero']?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-primary">
                                        <i class="fa fa-pencil"></i>
                                    </a>&nbsp;
                                    <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
        
<?php include("include/footer.php")?>