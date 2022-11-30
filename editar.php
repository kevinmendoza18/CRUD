<?php
include_once('conexion.php');

$id = $_GET['id'];

$query = "SELECT id, CONCAT(IFNULL(primer_nombre,''),' ',IFNULL(segundo_nombre,''),' ',IFNULL(primer_apellido,''),' ',IFNULL(segundo_apellido,'')) AS nombre_completo, id_sexo, id_ciudad, fecha_nacimiento FROM personas";
$personas = mysqli_query($con, $query) or die(mysqli_error($con));

$query = "SELECT id, nombre AS id_ciudad FROM ciudades";
$ciudades = mysqli_query($con, $query) or die(mysqli_error($con));

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Biblioteca - Editar Libro</title>
</head>

<body>
    <div class="container">
        <div>
            <div>
                <h3>Ingrese los datos actualizados...</h3>
                <div class="">
                    <form action="guardar.php" method="post">
                        <div class="mb-3 col-md-4">
                            <label for="primer_nombre" class="form-label">Primer nombre</label>
                            <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" placeholder="Primer nombre" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="segundo_nombre" class="form-label">Segundo nombre</label>
                            <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" placeholder="Segundo nombre">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="primer_apellido" class="form-label">Primer apellido</label>
                            <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" placeholder="Primer apellido" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="segundo_apellido" class="form-label">Segundo apellido</label>
                            <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" placeholder="Segundo apellido">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="sexo">Sexo</label>
                            <select class="form-select" id="id_sexo" name="id_sexo" required>
                                <option selected>Selecciona una opccion...</option>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="ciudad">ciudad</label>
                            <select class="form-select " id="id_ciudad" name="id_ciudad" required>
                                <option selected>Seleccione una Opcion...</option>
                                <?php foreach ($ciudades as $ciudad) : ?>
                                    <option value="<?= $ciudad['id'] ?>"><?= $ciudad['id_ciudad']  ?></option>";
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required>
                        </div>
                        <input type="submit" value="Guardar">
                        <a href="index.php">Regresar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>