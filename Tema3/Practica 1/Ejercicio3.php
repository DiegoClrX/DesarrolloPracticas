<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Ejercicio 3</title>
</head>

<body>
    <div style="margin-left: 30%;">
        <h1 class="display-1">Diccionario</h1>
        <form action="" method="post">
        <h5 style="margin:3% ;">Busca una palabra en el diccionario</h5>
            <input type="text" name="traduccion" class="form-control" id="" placeholder="Pon la palabra en Español" style="width: 30%;">
            <br>
            <input type="submit" value="Buscar" class="btn btn-primary">
        </form>
        <!-- ----------------------------------------------------------------------------------------------------------------------çd -->

        <?php

        //Muestra el diccionario 

        session_start();
        if (!isset($_SESSION['user-agent']))
            $_SESSION['user-agent'] = $_SERVER['HTTP_USER_AGENT'];
        else {
            if ($_SESSION['user-agent'] != $_SERVER['HTTP_USER_AGENT'])
                session_destroy();
        }


        if (!isset($_SESSION['word_list_es'])) {
            $_SESSION['word_list_es'] = array(
                "mesa", "esta", "ordenador", "movil", "teclado", "raton", "pizarra", "hola", "tenis", "pantalon", "camiseta", "felpudo", "radio", "la", "lapiz",
                "boligrafo", "mando", "caja", "cable", "internet", "electricidad", "aire", "viento", "lluvia", "nubes", "gafas", "negro", "blanco", "amarillo", "azul",
                "marron", "verde", "morado", "soporte", "compañero", "amigo", "madre", "padre", "novia", "abuela", "abuelo", "luz", "sol", "luna", "agua", "frio", "calor",
                "velocidad", "coche", "frenos", "calvo"
            );
        }

        if (!isset($_SESSION['word_list_en'])) {
            $_SESSION['word_list_en'] = array(
                "table", "this", "computer", "phone", "keyboard", "mouse", "blackboard", "hi", "tennis", "trousers", "t-shirt", "doormat", "radio", "the", "pencil", "pen", "send",
                "box", "cable", "internet", "electricity", "air", "wind", "rain", "clouds", "glasses", "black", "white", "yellow", "blue", "morron", "green", "purple", "support", "partner",
                "friend", "mom", "dad", "girlfrined", "grandmother", "grandpather", "light", "sun", "mon", "wather", "cold", "hot", "speed", "car", "brakes", "bald"
            );
        }


        //Si post recibe algo devuelve la traduccion de la palabra

        if (isset($_POST['traduccion'])) {
            $resultSearch = array_search($_POST['traduccion'], $_SESSION['word_list_es']);
            if ($resultSearch > 0) {
                echo "<p>" . $_SESSION['word_list_en'][$resultSearch] . "</p>";
            } else {
                echo "Palabra no encontrada";
            }
        }

        ?>
        <br>
        <a href="Ejercicio3.php?action=add">
            <button type="button" class="btn btn-primary" style="margin-left: 10%;" name="add" >Añadir</button>
        </a>

        <a href="Ejercicio3.php?action=del">
            <button type="button" class="btn btn-primary" name="del">Borrar</button>
        </a>

        <?php
        
        //METODO AÑADIR
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'add') {

        ?>
                <h5 style="margin:3% ;">Añadir Palabra al Diccionario</h5>
                <form method="POST">
                    <input type="text" name="palabraEsp" class="form-control" style="width: 30%; margin-bottom:2%;" placeholder="Introduzca la palabra en Español" require >
                    <input type="text" name="palabraEng" class="form-control" style="width: 30%; margin-bottom:2%;" placeholder="Introduzca la palabra en Ingles" require >
                    <button type="submit" class="btn btn-primary" name="añadir">Añadir</button>
                </form>

                <?php
                //Añade al array los elementos seleccionados
                if (isset($_POST['añadir'])) {
                    if (isset($_POST['palabraEsp'])) {
                        array_push($_SESSION['word_list_es'], $_POST['palabraEsp']);
                    }
                    if (isset($_POST['palabraEng'])) {
                        array_push($_SESSION['word_list_en'], $_POST['palabraEng']);
                    }
                }
            }
        }


        //METODO BORRAR
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'del') {

                ?>
                <h5 style="margin:3% ;">Borrar Palabra del Diccionario</h5>
                <form method="POST">
                    <input type="text" name="palabraEsp" class="form-control" style="width: 30%; margin-bottom:2%;" placeholder="Introduzca la palabra en Español" require>
                    <input type="submit" value="Borrar" name="borrar" class="btn btn-primary">
                </form>

        <?php
                if (isset($_POST['borrar'])) {
                    //Busca la posicion de la palabra que se ha escrito 
                    $pos = array_search($_POST['palabraEsp'], $_SESSION['word_list_es']);
                    if ($pos > 0) {
                        //Elimina desde la posicion
                        if (isset($_POST['palabraEsp'])) {
                            unset($_SESSION['word_list_es'][$pos]);
                        }
                        if (isset($_POST['palabraEng'])) {
                            unset($_SESSION['word_list_en'][$pos]);
                        }
                        //Reorganiza el array para que no queden huecos salteados
                        $_SESSION['word_list_es'] = array_values($_SESSION['word_list_es']);
                        $_SESSION['word_list_en'] = array_values($_SESSION['word_list_en']);
                    } else {
                        echo "Error. La palabra no se encuentra disponible en el diccionario";
                    }
                }
            }
        }

        ?>
    
    </div>
</body>

</html>