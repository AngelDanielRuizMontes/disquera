<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./icons/font/bootstrap-icons.min.css">
    <title>Disquera Turing - Modifica un Grupo</title>
    <style>
        .aire {
            padding: 10px 60px 10px 60px;
        }
        a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <?php
        $CodGrupo = $_POST["CodGrupo"];
        $Grupo = $_POST["Grupo"];
        $Genero = $_POST["Genero"];
    ?>
    <div class="container">

        <div class="card">
            <h1 class="text-center">Disquera Turing</h1>

            <form action="index.php" method="post">
                <input type="hidden" name="CodGrupoAntiguo" value="<?= $CodGrupo ?>">
                <input type="hidden" name="accion" value="modificar">
                <div class="mb-3 aire">
                    <label for="CodGrupo" class="form-label">CodGrupo</label>
                    <input type="text" class="form-control" id="CodGrupo" name="CodGrupo" value="<?= $CodGrupo ?>" >
                </div>
                <div class="mb-3 aire">
                    <label for="Grupo" class="form-label">Nombre del Grupo</label>
                    <input type="text" class="form-control" id="Grupo" name="Grupo" value="<?= $Grupo ?>">
                </div>
                <div class="mb-3 aire">
                    <label for="Genero" class="form-label">Genero</label>
                    <input type="text" class="form-control" id="Genero" name="Genero" value="<?= $Genero ?>">
                </div>
                <div class="mb-3 aire aire">
                <button type="submit" class="btn btn-success">
                    Aceptar
                </button>
                <button class="btn btn-danger">
                    <a href="./index.php">Cancelar</a>
                </button>
                </div>
            </form>

        </div>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>