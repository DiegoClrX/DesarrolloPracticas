<?php

namespace blackJack;

class VistaGanador
{

    static function renderGanador($partidas)
    {
?>
        <div>
            <section class="crupier" style="margin-left: 26%; margin-top: 5%; position: absolute;">
            <h2 style="margin-left: -30%; color: white;">EL GANADOR DEL BLACKJACK ES</h2>
                <?php
                //JUGADOR
                if ($partidas->getJugador()->valorMano() > 21) {
                ?>
                    <h1 style="margin-left: -70%;">Gana Crupier</h1>
                    <p style="color: while; margin-top: -30%; margin-left: -30%;">El jugador se ha pasado de 21 el valor de sus cartas es
                        <script>
                            document.getElementById(addCarta).disabled = false;
                        </script>
                    <?php
                    echo $partidas->getJugador()->valorMano() . "</p>";
                }
                    ?>

                    <?php
                    //JUGADOR
                    if ($partidas->getJugador()->valorMano() == 21) {
                    ?>
                        <h1 style="margin-left: -70%;">Black Jack</h1>
                        <p style="color: while; margin-top: -30%; margin-left: -30%;">El jugador se ha pasado de 21 el valor de sus cartas es
                            <script>
                                document.getElementById(addCarta).disabled = false;
                            </script>
                        <?php
                        echo $partidas->getJugador()->valorMano() . "</p>";
                    }
                        ?>

                        <?php
                        //CRUPIER
                        if ($partidas->getCrupier()->valorMano() > 21) {
                        ?>
                            <h1 style="margin-left: -70%;">Gana Jugador</h1>
                            <p style="color: while; margin-top: -30%; margin-left: -30%;">El jugador se ha pasado de 21 el valor de sus cartas es
                                <script>
                                    document.getElementById(addCarta).disabled = false;
                                </script>
                            <?php
                            echo $partidas->getJugador()->valorMano() . "</p>";
                        }
                            ?>
            </section>

        </div>
<?php
    }
}
?>