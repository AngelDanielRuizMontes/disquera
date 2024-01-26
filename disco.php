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
    $conexion = mysqli_connect("db", "root", "test", "disquera");
    $consulta = mysqli_query($conexion, "SELECT disco.*, grupo.Grupo FROM disco join grupo on disco.CodGrupo = grupo.CodGrupo where CodDisco=:CodDisco");
    ?>

    <?php
    if (!isset($_POST["accion"])) {
        $_POST["accion"] = "";
    }

    if ($_POST["accion"] == "eliminar") {
        $borra = "DELETE FROM disco WHERE CodDisco=\"$_POST[CodDisco]\"";
        mysqli_query($conexion, $borra);
    }

    if ($_POST["accion"] == "insertar") {
        $inserta = "INSERT INTO disco VALUES ( \"$_POST[CodDisco]\",\"$_POST[NombreDisco]\",\"$_POST[AnnoPublicacion]\",\"$_POST[CodGrupo]\")";
        mysqli_query($conexion, $inserta);
    }

    if ($_POST["accion"] == "modificar") {
        $modifica = "UPDATE disco SET CodDisco=\"$_POST[CodDisco]\",NombreDisco=\"$_POST[NombreDisco]\",AnnoPublicacion=\"$_POST[AnnoPublicacion]\",CodGrupo=\"$_POST[CodGrupo]\" WHERE CodDisco = \"$_POST[CodDiscoAntiguo]\"";
        mysqli_query($conexion, $modifica);
    }

    $consulta = mysqli_query($conexion, "SELECT disco.*, grupo.Grupo FROM disco join grupo on disco.CodGrupo = grupo.CodGrupo");
    ?>
    <br>
    <div class="container">

        <div class="card">
            <h1 class="text-center">Discos</h1>


            <table class="table table-striped">
                <tr>
                    <th>CodDisco</th>
                    <th>Nombre del Disco</th>
                    <th>Año de Publicación</th>
                    <th>Grupo</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php
                while ($registro = mysqli_fetch_array($consulta)) {
                ?>
                    <tr>
                        <td><?= $registro['CodDisco'] ?></td>
                        <td><?= $registro['NombreDisco'] ?></td>
                        <td><?= $registro['AnnoPublicacion'] ?></td>
                        <td><?= $registro['Grupo'] ?></td>
                        <td>
                            <form action="disco.php" method="post">
                                <input type="hidden" name="accion" value="eliminar">
                                <input type="hidden" name="CodDisco" value="<?= $registro['CodDisco'] ?>">
                                <button type="submit" class="btn btn-danger">
                                    <span class="bi bi-trash3"></span>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="modifica-disco.php" method="post">
                                <input type="hidden" name="CodDisco" value="<?= $registro['CodDisco'] ?>">
                                <input type="hidden" name="NombreDisco" value="<?= $registro['NombreDisco'] ?>">
                                <input type="hidden" name="AnnoPublicacion" value="<?= $registro['AnnoPublicacion'] ?>">
                                <input type="hidden" name="CodGrupo" value="<?= $registro['CodGrupo'] ?>">
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
                <form action="disco.php" method="post">
                    <input type="hidden" name="accion" value="insertar">
                    <tr>
                        <td><input type="text" name="CodDisco" size="10"></td>
                        <td><input type="text" name="NombreDisco"></td>
                        <td><input type="text" name="AnnoPublicacion"></td>
                        <td><input type="text" name="CodGrupo"></td></td>
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