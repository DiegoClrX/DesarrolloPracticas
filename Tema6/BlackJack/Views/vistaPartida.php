<?php

namespace blackJack;

class VistaPartida
{

    static function renderPartida($partidas)
    {
    ?>
        <div>
         <section class="crupier" style="margin-left: 26%; margin-top: 5%; position: absolute;">
            <?php
            $cont = 0;
                foreach($partidas->getCrupier()->getMano() as $carta){
                    echo "<img src='../cards/".$carta.".png' width='10%' alt='...'>";
                }
            ?>
        </section>

        <section class="jugador" style="margin-top: 20%; margin-left: 26%; position: absolute;">
            <?php
                
            foreach($partidas->getJugador()->getMano() as $carta){
                echo "<img src='../cards/".$carta.".png' width='10%' alt='...'>";
            }
            ?>
            
            <p style="color: white; margin-left: 5%;">Valor: <?php echo $partidas->getJugador()->valorMano();  ?></p>
        </section>

        </div>
    <?php
    }
}
?>