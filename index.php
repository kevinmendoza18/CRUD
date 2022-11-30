<?php
include_once('conexion.php');

$query = "SELECT personas.id, CONCAT(IFNULL(primer_nombre,''),' ',IFNULL(segundo_nombre,''),' ',IFNULL(primer_apellido,''),' ',IFNULL(segundo_apellido,'')) AS nombre_completo, sexo.nombre  AS sexo, ciudades.nombre AS ciudad, fecha_nacimiento 
FROM personas JOIN ciudades ON ciudades.id = personas.id_ciudad
JOIN sexo ON sexo.id = personas.id_sexo";
$personas = mysqli_query($con, $query) or die(mysqli_error($con));

$query = "SELECT ciudades.id,  nombre AS nombre FROM ciudades";
$ciudades = mysqli_query($con, $query) or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="bg-black">
    <div class="container text-success">
        <div class="row">
            <div class="col-sm">
                <h1>FORMULARIO PARA EL INGRESO DE PERSONAS</h1>
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
                                <?php foreach ($ciudades as $nombre) : ?>
                                    <option value="<?= $nombre['id'] ?>"><?= $nombre['nombre'] ?></option>";
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required>
                        </div>

                        <input type="submit" class="btn btn-lg btn-outline-warning" value="Enviar">
                    </form>
                </div>


                <div class="col-sm">

                    <table class="table table-hover text-light">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">Fecha_nacimiento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (mysqli_num_rows($personas) > 0) {
                                $pos = 1;

                                while ($persona = mysqli_fetch_assoc($personas)) {


                                    //  $libros = [$data['titulo'], $data['autor'], $data['disponible']];



                            ?>
                                    <tr>
                                        <td><?php echo $pos; ?></td>
                                        <td><?php echo $persona['nombre_completo']; ?></td>
                                        <td><?php echo $persona['sexo']; ?></td>
                                        <td><?php echo $persona['ciudad']; ?></td>
                                        <td><?php echo $persona['fecha_nacimiento']; ?></td>


                                        <td><a href="editar.php?id=<?php echo $persona['id']; ?>" class="btn btn-sm btn-outline-danger">editar</a></td>
                                        <td><a href="eliminar.php?id=<?php echo $persona['id']; ?>" class="btn btn-sm btn-outline-danger" value="">eliminar</a></td>
                                    </tr>
                                <?php $pos++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="9">no hay datos</td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>

                <!-- JavaScript Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>