<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./icons/font/bootstrap-icons.min.css">
    <title>Disquera Turing - Modifica una Canción</title>
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
        $CodCancion = $_POST["CodCancion"];
        $Cancion = $_POST["NombreCancion"];
        $Duracion = $_POST["Duracion"];
        $CodDisco = $_POST["CodDisco"];
    ?>
    <div class="container">

        <div >
            <h1 class="text-center">Disquera Turing</h1>

            <form action="cancion.php" method="post">
                <input type="hidden" name="CodCancionAntiguo" value="<?= $CodCancion ?>">
                <input type="hidden" name="accion" value="modificar">
                <div class="mb-3 aire">
                    <label for="CodCancion" class="form-label">CodCancion</label>
                    <input type="text" class="form-control" id="CodCancion" name="CodCancion" value="<?= $CodCancion ?>" >
                </div>
                <div class="mb-3 aire">
                    <label for="NombreCancion" class="form-label">Nombre de la Canción</label>
                    <input type="text" class="form-control" id="NombreCancion" name="NombreCancion" value="<?= $Cancion ?>">
                </div>
                <div class="mb-3 aire">
                    <label for="Duracion" class="form-label">Duración</label>
                    <input type="text" class="form-control" id="Duracion" name="Duracion" value="<?= $Duracion ?>">
                </div>
                <div class="mb-3 aire">
                    <label for="CodDisco" class="form-label">CodDisco</label>
                    <input type="text" class="form-control" id="CodDisco" name="CodDisco" value="<?= $CodDisco ?>">
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