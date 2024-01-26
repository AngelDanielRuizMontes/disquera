<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./icons/font/bootstrap-icons.min.css">
    <title>Disquera Turing - Modifica un Disco</title>
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
        $CodDisco = $_POST["CodDisco"];
        $Disco = $_POST["NombreDisco"];
        $Anno = $_POST["AnnoPublicacion"];
        $CodGrupo = $_POST["CodGrupo"];
    ?>
    <div class="container">

        <div class="card">
            <h1 class="text-center">Disquera Turing</h1>

            <form action="disco.php" method="post">
                <input type="hidden" name="CodDiscoAntiguo" value="<?= $CodDisco ?>">
                <input type="hidden" name="accion" value="modificar">
                <div class="mb-3 aire">
                    <label for="CodDisco" class="form-label">CodDisco</label>
                    <input type="text" class="form-control" id="CodDisco" name="CodDisco" value="<?= $CodDisco ?>" >
                </div>
                <div class="mb-3 aire">
                    <label for="NombreDisco" class="form-label">Nombre del Disco</label>
                    <input type="text" class="form-control" id="NombreDisco" name="NombreDisco" value="<?= $Disco ?>">
                </div>
                <div class="mb-3 aire">
                    <label for="AnnoPublicacion" class="form-label">Año de Publicación</label>
                    <input type="text" class="form-control" id="AnnoPublicacion" name="AnnoPublicacion" value="<?= $Anno ?>">
                </div>
                <div class="mb-3 aire">
                    <label for="CodGrupo" class="form-label">CodGrupo</label>
                    <input type="text" class="form-control" id="CodGrupo" name="CodGrupo" value="<?= $CodGrupo ?>">
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