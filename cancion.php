<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./icons/font/bootstrap-icons.min.css">
    <link href="styles.css" rel="stylesheet" type="text/css" />
    <title>Disquera Turing</title>
</head>

<body>

    <?php
    $conexion = mysqli_connect("xxxxxx", "xxxxxx", "xxxxxx", "xxxxxx");
    $consulta = mysqli_query($conexion, "SELECT disco.CodDisco, disco.NombreDisco, cancion.* FROM cancion left join disco on cancion.CodDisco = disco.CodDisco WHERE CodDisco = :CodDisco");
    ?>

    <?php
    if (!isset($_POST["accion"])) {
        $_POST["accion"] = "";
    }

    if ($_POST["accion"] == "eliminar") {
        $borra = "DELETE FROM cancion WHERE CodCancion=\"$_POST[CodCancion]\"";
        mysqli_query($conexion, $borra);
    }

    if ($_POST["accion"] == "insertar") {
        $inserta = "INSERT INTO cancion VALUES ( \"$_POST[CodCancion]\",\"$_POST[NombreCancion]\",\"$_POST[Duracion]\",\"$_POST[CodDisco]\")";
        mysqli_query($conexion, $inserta);
    }

    if ($_POST["accion"] == "modificar") {
        $modifica = "UPDATE cancion SET CodCancion=\"$_POST[CodCancion]\",NombreCancion=\"$_POST[NombreCancion]\",Duracion=\"$_POST[Duracion]\",CodDisco=\"$_POST[CodDisco]\" WHERE CodCancion = \"$_POST[CodCancionAntiguo]\"";
        mysqli_query($conexion, $modifica);
    }

    $consulta = mysqli_query($conexion, "SELECT disco.CodDisco, disco.NombreDisco, cancion.* FROM cancion left join disco on cancion.CodDisco = disco.CodDisco");
    ?>
    <br>
    <div class="container">

        <div class="card">
            <h1 class="text-center">Canciones</h1>


            <table class="table table-striped">
                <tr>
                    <th>CodCancion</th>
                    <th>Nombre de la Canción</th>
                    <th>Duración</th>
                    <th>Disco</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php
                while ($registro = mysqli_fetch_array($consulta)) {
                ?>
                    <tr>
                        <td><?= $registro['CodCancion'] ?></td>
                        <td><?= $registro['NombreCancion'] ?></td>
                        <td><?= $registro['Duracion'] ?></td>
                        <td><?= $registro['NombreDisco'] ?></td>
                        <td>
                            <form action="cancion.php" method="post">
                                <input type="hidden" name="accion" value="eliminar">
                                <input type="hidden" name="CodCancion" value="<?= $registro['CodCancion'] ?>">
                                <button type="submit" class="btn btn-danger">
                                    <span class="bi bi-trash3"></span>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="modifica-cancion.php" method="post">
                                <input type="hidden" name="CodCancion" value="<?= $registro['CodCancion'] ?>">
                                <input type="hidden" name="NombreCancion" value="<?= $registro['NombreCancion'] ?>">
                                <input type="hidden" name="Duracion" value="<?= $registro['Duracion'] ?>">
                                <input type="hidden" name="CodDisco" value="<?= $registro['CodDisco'] ?>">
                                <button type="submit" class="btn btn-primary">
                                    <span class="bi bi-pencil"></span>
                                    Modificar
                                </button>
                            </form>
                        </td>
                    </tr>

                <?php
                }
                ?>
                <form action="cancion.php" method="post">
                    <input type="hidden" name="accion" value="insertar">
                    <tr>
                        <td><input type="text" name="CodCancion" size="10"></td>
                        <td><input type="text" name="NombreCancion"></td>
                        <td><input type="text" name="Duracion"></td>
                        <td><input type="text" name="CodDisco"></td></td>
                        <td>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-floppy"></i>
                                Añadir
                            </button>
                        </td>
                        <td><a href="index.php" class="btn btn-primary">Página Anterior</a></td>
                    </tr>
                </form>
            </table>
        </div>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>
