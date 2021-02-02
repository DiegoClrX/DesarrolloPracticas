<?php
include_once("cabecera9.php");

$fotos = array(
    array("usuario"=>"diegswc", "imagen"=>"img9/pinoUnaMano.jpg", "meGustas"=>1567,"corazon"=>"img9/corazon.png","bocadillo"=>"bocadillo1.png" ,"lugar"=>"Mi Casa"),
    array("usuario"=>"photohd", "imagen"=>"img9/1.jpg", "meGustas"=>1567,"corazon"=>"img9/corazon.png","bocadillo"=>"bocadillo1.png" ,"lugar"=>"Mi Casa"),
    array("usuario"=>"wallpaperhd", "imagen"=>"img9/2.jpg", "meGustas"=>1567,"corazon"=>"img9/corazon.png","bocadillo"=>"bocadillo1.png" ,"lugar"=>"Mi Casa"),
    array("usuario"=>"hdphotowallp", "imagen"=>"img9/3.jpg", "meGustas"=>1567,"corazon"=>"img9/corazon.png","bocadillo"=>"bocadillo1.png" ,"lugar"=>"Mi Casa"),
    array("usuario"=>"photo8779", "imagen"=>"img9/4.jpg", "meGustas"=>1567,"corazon"=>"img9/corazon.png","bocadillo"=>"bocadillo1.png" ,"lugar"=>"Mi Casa"),
    array("usuario"=>"asus90", "imagen"=>"img9/5.jpg", "meGustas"=>1567,"corazon"=>"img9/corazon.png","bocadillo"=>"bocadillo1.png" ,"lugar"=>"Mi Casa"),
    array("usuario"=>"fotosonitas", "imagen"=>"img9/6.jpg", "meGustas"=>1567,"corazon"=>"img9/corazon.png","bocadillo"=>"bocadillo1.png" ,"lugar"=>"Mi Casa")
);

$comentarios = array(
    array("userPhoto"=>"diegswc", "userComent"=>"fonsico_sb", "coment"=>"Constancia y esfuerzo🔥💪"),
    array("userPhoto"=>"diegswc", "userComent"=>"yeraialonso", "coment"=>"Muy buena bro🔥"),

    array("userPhoto"=>"photohd", "userComent"=>"usuario1", "coment"=>"Muy bonita la foto😍"),
    array("userPhoto"=>"photohd", "userComent"=>"usuario2", "coment"=>"Preciosa😍"),

    array("userPhoto"=>"wallpaperhd", "userComent"=>"usuario3", "coment"=>"Me encanta😍"),
    array("userPhoto"=>"wallpaperhd", "userComent"=>"usuario4", "coment"=>"Guapisima 😍"),

    array("userPhoto"=>"hdphotowallp", "userComent"=>"usuario5", "coment"=>"Muy Guapa"),
    array("userPhoto"=>"hdphotowallp", "userComent"=>"usuario6", "coment"=>"Brutal 😍"),

    array("userPhoto"=>"photo8779", "userComent"=>"usuario7", "coment"=>"Alaa"),
    array("userPhoto"=>"photo8779", "userComent"=>"usuario8", "coment"=>"P**** brutal 😍"),

    array("userPhoto"=>"asus90", "userComent"=>"usuario9", "coment"=>"😍😍😍"),
    array("userPhoto"=>"asus90", "userComent"=>"usuario10", "coment"=>"🔥🔥🔥"),

    array("userPhoto"=>"fotosonitas", "userComent"=>"usuario11", "coment"=>"❄️🔥"),
    array("userPhoto"=>"fotosonitas", "userComent"=>"usuario12", "coment"=>"Muy muy guapa 🔥")
);

function leerUserComent($comentarios, $user){
    foreach($comentarios as $coment){
        if($coment['userPhoto']==$user){
            echo "@". $coment['userComent']." ".$coment['coment']."<br>";
        }
    }
}

function pintarFotos($fotos, $user, $comentarios){

        foreach($fotos as $usuario){
            
            if($usuario['usuario']==$user){
            echo "<div class = 'padre'>";
            echo "<h1 class = 'titulo'>INSTAGRAM</h1><br>";
                echo "<div class='post'>";

                    echo "<div class = 'cabecera'>";
                        echo "<img src='img9/anonimo.png' class='fotoUser' alt = 'error>";
                        echo "<h1 class = 'user'>".$usuario['usuario']."</h1>";
                        echo "<p class = 'place'>".$usuario['lugar']."</p>";
                    echo "</div>";

                    echo '<img src="'.$usuario["imagen"].'" class="img" alt="error">';   
                    echo "<img src='img9/corazon1.png' class='corazon' alt = 'error>";
                    echo '<img src="'.$usuario["corazon"].'" class="img" alt="error">';
                    echo '<img src="'.$usuario["bocadillo"].'" class="img" alt="error">';
                    
                    echo "<div class='likes'>";
                        echo "<br>"."<p class = 'inferior'>".$usuario['meGustas']." Me gustas </p>";
                        echo "<p class = 'inferior'>comentarios...</p>";
                    echo "</div";

                    echo "<div class='col-10 row-5 text-truncate'>";
                        echo '<span class="card-text d-inline-block text-truncate  style="max-width: 300px; font-size:10px ">'.leerUserComent($comentarios, $usuario['usuario']).'</span>';
                    echo "</div>";

                echo "</div>";

            echo "</div>";
            }
        }
}
   foreach($fotos as $usuario){
    pintarFotos($fotos, $usuario['usuario'],$comentarios);
   }
    

?>