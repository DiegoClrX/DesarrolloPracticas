<?php

namespace seriesTV;

class VistaComentario
{
    static function renderComentarios($comentarios)
    {
?>

        <div style='margin-top:30%; margin-left:5%;'>

            <?php foreach($comentarios as $comentario) { ?>
                <div style='width:25%; float:left; margin-bottom:5%;'>
                    <h2 style='color:#BDBDBD'><?php echo $comentario['usuario'] ?></h2>
                    <p style='color:#BDBDBD'> Nota: <?php echo $comentario['nota'] ?></p>
                    <p style='color:#BDBDBD'> Fecha Inicio: <?php echo $comentario['comentario'] ?></p>
                </div>


    <?php
            }
            echo "</div>";
        }
    }
    ?>