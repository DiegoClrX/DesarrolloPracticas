<?php

namespace seriesTV;

class VistaPeliculas
{
    static function renderTodasPeliculas($pelis)
    {
?>

        <div style='margin-top:30%; margin-left:5%;'>

            <?php for ($i = 0; $i < 20; $i++) { ?>
                <div style='width:25%; float:left; margin-bottom:5%;'>
                    <img src='https://image.tmdb.org/t/p/w500/<?php echo $pelis->results[$i]->poster_path ?>' style='width:70%;'>
                    <h2 style='color:#BDBDBD'><?php echo $pelis->results[$i]->name ?></h2>
                    <p style='color:#BDBDBD'> Puntuacion: <?php echo $pelis->results[$i]->vote_average ?></p>
                    <p style='color:#BDBDBD'> Fecha Inicio: <?php echo $pelis->results[$i]->first_air_date ?></p>
                    <form action="../Controller/controlador.php" method = "GET">
                        <input type='hidden' id='idSerie' name='idSerie' value='<?php echo $pelis->results[$i]->id ?>'>
                        <input type='submit' id='verMas' name='verSerie' class='btn btn-primary' value='Ver Mas'>
                    </form>
                </div>


    <?php
            }
            echo "</div>";
        }
    }
    ?>