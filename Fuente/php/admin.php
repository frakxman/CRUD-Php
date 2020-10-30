<?php

include '../bd/conexion.php';

$object = new Conexion();

$conection = $object->conectar();

$consult = "SELECT * FROM users";
$result = $conection->prepare($consult);
$result->execute();
$data = $result->fetchAll(PDO::FETCH_ASSOC);
// print_r($data);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestor de Usuarios</title>

        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/datatables/datatables.min.css">
        <link rel="stylesheet" href="../assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <header>
            <h1 class="text-center">Gestor de Usuarios</h1>
        </header>
        <main>
            <div class="container"> <!-- Create Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <button id="btnNew" type="button" class="btn btn-success m-3">Crear</button>
                    </div>
                </div>
            </div>

            <div class="container"> <!-- Data Table -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="userTable" class="table table-striped table-bordered table-condensed" style="width: 100%;">
                                <thead class="text-center">
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Año Nacimiento</th>
                                        <th>G&eacute;nero</th>
                                        <th>Usuario</th>
                                        <th>Contraseña</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach( $data as $dat ) {
                                    ?>
                                    <tr>
                                        <td><?php echo $dat['id'] ?></td>
                                        <td><?php echo $dat['name'] ?></td>
                                        <td><?php echo $dat['lastName'] ?></td>
                                        <td><?php echo $dat['birthday'] ?></td>
                                        <td><?php echo $dat['gender'] ?></td>
                                        <td><?php echo $dat['user'] ?></td>
                                        <td><?php echo $dat['password'] ?></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>  
        </main>

        <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog"> <!-- Modal -->
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"></h5>
                            <button type="button" class="close" data-dismiss="modal">X</button>
                        </div>
                        <form id="formUsers">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Nombre</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="lastName" class="col-form-label">Apellido</label>
                                    <input type="text" class="form-control" id="lastName">
                                </div>
                                <div class="form-group">
                                    <label for="birthday" class="col-form-label">Año Nacimiento</label>
                                    <input type="text" class="form-control" id="birthday">
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="col-form-label">G&eacute;nero</label>
                                    <input type="text" class="form-control" id="gender">
                                </div>
                                <div class="form-group">
                                    <label for="user" class="col-form-label">Usuario</label>
                                    <input type="text" class="form-control" id="user">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-form-label">Contraseña</label>
                                    <input type="text" class="form-control" id="password">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                                <button type="submit" id="btnSave" class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
        <!-- 
        ------------------------------------------
        -- Scripts
        ------------------------------------------
        -->
        <script src="../assets/jquery/jquery-3.3.1.min.js"></script>
        <script src="../assets/popper/popper.min.js"></script>
        <script src="../assets/datatables/datatables.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/admin.js"></script>
    </body>
</html>