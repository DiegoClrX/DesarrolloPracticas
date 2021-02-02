<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Diccionario</title>
</head>
<body>
  <div style=" margin-top: 15%;">
    <h1 class="display-1" style="text-align: center;"   >📚 Diccionario 📚</h1>
    <h3 class="display-4" style="text-align: center;">Bienvenidos al diccionario</h3>
    <form action="controlador.php" method="post">
        <input type="text" name="buscador" class="form-control" style="width: 25%; margin-left: 35%;"> <input type="submit" value="buscar" style="position: absolute; margin-left: 62%; margin-top: -3%;" class="btn btn-primary"> 
    </form>
    <h4 class="display-4" style="margin-top: 3%; text-align: center;"   >Otras Opciones:</h4>
        <div style="margin-left: 27%; margin-top: 1%;">
            <a href="añadirPalabra.php">
                <button type="button" class="btn btn-primary" style="width: 20%;">Añadir Palabra</button>
            </a>
            <a href="eliminarPalabra.php">
                <button type="button" class="btn btn-primary" style="width: 20%;">Eliminar Palabra</button>
            </a>
            <a href="controlador.php?action=mostrarDiccionario">
                <button type="button" class="btn btn-primary" style="width: 25%;">Mostrar Diccionario</button>
            </a>
        </div>
  </div>
</body>
</html>