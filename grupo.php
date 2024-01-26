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
    $consulta = mysqli_query($conexion, "SELECT * FROM grupo");
    ?>

    <?php
    if (!isset($_POST["accion"])) {
        $_POST["accion"] = "";
    }

    if ($_POST["accion"] == "eliminar") {
        $borra = "DELETE FROM grupo WHERE CodGrupo=\"$_POST[CodGrupo]\"";
        mysqli_query($conexion, $borra);
    }

    if ($_POST["accion"] == "insertar") {
        $inserta = "INSERT INTO grupo VALUES ( \"$_POST[CodGrupo]\",\"$_POST[Grupo]\",\"$_POST[Genero]\")";
        mysqli_query($conexion, $inserta);
    }

    if ($_POST["accion"] == "modificar") {
        $modifica = "UPDATE grupo SET CodGrupo=\"$_POST[CodGrupo]\",Grupo=\"$_POST[Grupo]\",Genero=\"$_POST[Genero]\" WHERE CodGrupo = \"$_POST[CodGrupoAntiguo]\"";
        mysqli_query($conexion, $modifica);
    }

    $consulta = mysqli_query($conexion, "SELECT * FROM grupo");
    ?>
    <br>
    <div class="container">

        <div class="card">
            <h1 class="text-center">Grupos</h1>


            <table class="table table-striped">
                <tr>
                    <th>CodGrupo</th>
                    <th>Grupo</th>
                    <th>Genero</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php
                while ($registro = mysqli_fetch_array($consulta)) {
                ?>
                    <tr>
                        <td><?= $registro['CodGrupo'] ?></td>
                        <td><?= $registro['Grupo'] ?></td>
                        <td><?= $registro['Genero'] ?></td>
                        <td>
                            <form action="grupo.php" method="post">
                                <input type="hidden" name="accion" value="eliminar">
                                <input type="hidden" name="CodGrupo" value="<?= $registro['CodGrupo'] ?>">
                                <button type="submit" class="btn btn-danger">
                                    <span class="bi bi-trash3"></span>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="modifica-grupo.php" method="post">
                                <input type="hidden" name="CodGrupo" value="<?= $registro['CodGrupo'] ?>">
                                <input type="hidden" name="Grupo" value="<?= $registro['Grupo'] ?>">
                                <input type="hidden" name="Genero" value="<?= $registro['Genero'] ?>">
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
                <form action="grupo.php" method="post">
                    <input type="hidden" name="accion" value="insertar">
                <tr>
                    <td><input type="text" name="CodGrupo" size="10" ></td>
                    <td><input type="text" name="Grupo"></td>
                    <td><input type="text" name="Genero"></td>
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
