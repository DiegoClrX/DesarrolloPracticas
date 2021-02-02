
<?php
include_once("cabecera8.php");

$libreria = array(
    array("ISBN"=> 8437606403,"titulo" => "Odisea", "descripcion"=>"  Lo verdaderamente importante es que bajo este nombre, supuesto o no, se encuentra un genial poeta que supo dar uniformidad de lengua y estilo a una serie de elementos heredados del folclore mediterráneo, anatolio, de la saga griega y del mundo mágico, consiguiendo construir esta monumental epopeya dramática. Esta edición plantea la polémica en torno a la autoría, fecha y uniformidad del poema, a la vez que presenta una traducción en prosa suelta con tono de novela o cuento.", "categoria"=>"historia", "editorial"=>"Letras Universales", "foto"=>"img8/1.jpg", "precio"=>11,87),
    array("ISBN"=> 8420412147,"titulo" => "Don Quijote", "descripcion"=>"Los años 2015 y 2016 conforman un bienio de aniversarios cervantinos. A la celebración del IV Centenario de la publicación de la segunda parte de Don Quijote (2015), le sigue, en 2016, la conmemoración del IV Centenario de la muerte de su autor, Miguel de Cervantes. Como ocurrió hace más de una década, las Academias de la Lengua Española y la editorial Alfaguara se unen a esta celebración con la reedición de este clásico universal, que llevaba siete años fuera de las librerías. Esta edición reproduce el texto crítico y las notas de Francisco Rico, a su vez coordinador del volumen, y se completa con estudios de escritores y filólogos de la talla de Mario Vargas Llosa, Francisco Ayala, Martín de Riquer, José Manuel Blecua, Guillermo Rojo, José Antonio Pascual, Margit Frenk y Claudio Guillén.", "categoria"=>"historia", "editorial"=>"Alfaguara ", "foto"=>"img8/2.jpg", "precio"=>13.20),
    array("ISBN"=> 8491050892,"titulo" => "Frankenstein", "descripcion"=>"En 1816, Mary Shelley dio vida al que sería su personaje más famoso, el doctor Victor Frankenstein. La historia es bien conocida: un científico consigue crear una criatura a la que luego rechaza. Metáfora sobre la vida, la libertad y el amor, Frankenstein o el moderno Prometeo es una maravillosa fábula con todos los ingredientes de los grandes mitos.", "categoria"=>"historia", "editorial"=>"Penguin Clásicos", "foto"=>"img8/3.jpg", "precio"=>17.50),
    array("ISBN"=> 8491041516,"titulo" => "Guerra y paz ", "descripcion"=>"Situada entre 1805 y 1813, en la Rusia convulsionada por la amenaza napoleónica, 'Guerra y paz' es una de las cumbres indiscutidas de la literatura universal. Las andanzas y peripecias de cuatro familias de aristócratas (los Kuraguin, los Bezujov, los Rostov y los Bolkonsky) articulan esta poderosa novela que abarca todos los registros y eternas preocupaciones del ser humano -el amor, la muerte, el bien y el mal, el sentido de la existencia, la amistad, el desengaño...- y recrea una época histórica decisiva -desde las grandes batallas que valieron la gloria a Napoleón, como Austerlitz, hasta el incendio de Moscú y la retirada del ejército francés en medio del frío y de las penalidades- en un conjunto prodigioso que arrebata al lector.", "categoria"=>"historia", "editorial"=>" Anaya ", "foto"=>"img8/4.jpg", "precio"=>22.80),
    array("ISBN"=> 8490564027,"titulo" => "Cualquier otro día", "descripcion"=>"Aunque mi relación con Dennis Lehane es reciente –apenas se remonta a la lectura de La entrega y de esta novela–, de él, y de su estilo narrativo, voy aprendiendo algunas cosas. Por ejemplo, que se le da excepcionalmente bien construir algunos diálogos, crear a sus personajes y moverse entre esas calles abandonadas a su propia ley de violencia y corrupción. También sé que se recrea con gusto, y con acierto por qué no, entre los barrios obreros de su Boston natal. Que es capaz de hacerte oler la sangre que se mezcla con sus textos. O que sus novelas tienen cierto acento irlandés.", "categoria"=>"novela negra", "editorial"=>"RBA Libros", "foto"=>"img8/6.jpg","precio"=>25.50),
    array("ISBN"=> 8417511709,"titulo"=>"El poder del perro", "descripcion"=>"Década de los setenta: el gobierno de Estados Unidos emprende una lucha sin cuartel contra el narcotráfico en México. Art Keller, un joven agente de la DEA de origen hispano, no tarda en obtener resultados y acabar con el patrón local. Un error fatal. El nuevo heredero del imperio del narcotráfico es Adán Barrera, y ambos saben cómo ha llegado a serlo.", "categoria"=>"novela Negra", "editorial"=>"RESERVOIR BOOKS", "foto"=>"img8/7.jpg","precio"=>14.90),
    array("ISBN"=> 8416709556,"titulo"=>"'El muñeco de nieve'", "descripcion"=>"La primera nevada cae en noviembre este año en Oslo. La mañana siguiente, al despertarse, un niño no encuentra a su madre en casa. Se le hace raro encontrar su bufanda favorita colgando del cuello de un muñeco de nieve que alguien ha hecho en el jardín. El detective Harry Hole empieza a sospechar que hay un psicópata suelto, desde hace demasiado tiempo, cuando descubre que un alarmante número de madres y esposas han desaparecido en circunstancias similares, tras caer la primera nieve. Nunca antes se ha enfrentado Harry, ni ningún otro policía, a un asesino en serie en suelo noruego. Va a verse obligado a seguir las reglas de un juego macabro que lo pueden llevar al límite de la locura.", "categoria"=>"novela negra", "editorial"=>"RESERVOIR BOOKS", "foto"=>"img8/8.jpg","precio"=>18.90),
    array("ISBN"=> 9788413142449, "titulo"=>"CICATRIZ", "descripcion"=>"Simon Sax podría ser un tipo afortunado. Es joven, listo y está punto de convertirse en multimillonario si vende su gran invento -un asombroso algoritmo- a una multinacional. Y, sin embargo, se siente solo. Su éxito contrasta con sus nulas habilidades sociales.", "categoria"=>"novela negra", "editorial"=>"ABC", "foto"=>"img8/9.jpg","precio"=>10.50),
    array("ISBN"=> 9788423355655, "titulo"=>"El cuarto mono", "descripcion"=>"El detective de la policía de Chicago Sam Porter investiga el caso de un hombre atropellado, pues los indicios en la escena del crimen apuntan a que se trata de El Cuarto Mono, un asesino en serie que ha estado aterrorizando la ciudad. Su modus operandi consistía en enviar tres cajas blancas a los padres de las víctimas que secuestra y mata: una primera con una oreja, una segunda con los dos ojos, y otra con la lengua; y finalmente dejar abandonado el cuerpo sin vida en algún lugar. El hombre atropellado llevaba una de esas cajas blancas. Se inicia así una frenética carrera contrarreloj para averiguar dónde se encuentra encerrada la próxima víctima.", "categoria"=>"novela negra", "editorial"=>"booket", "foto"=>"img8/10.jpg","precio"=>9.45),
    array("ISBM"=> 9788496546486, "titulo"=>"El Psicoanalista", "descripcion"=>"Feliz cumpleaños, doctor. Bienvenido al primer día de su muerte. Así comienza el anónimo que recibe Starks, psicoanalista con una larga experiencia y una tranquila vida cotidiana. Starks tendrá que emplear toda su astucia y rapidez para, en quince días, averiguar quién es el autor de esa amenazadora misiva que promete hacerla la existencia imposible.", "categoria"=>"thriller", "editorial"=>"B DE BOLSILLO","foto"=>"img8/11.jpg", "precio"=>30.55),
    array("ISBM"=> 9788499181363, "titulo"=>"Se lo que esta pasando", "descripcion"=>"Un hombre recibe una carta que le urge a pensar en un número, cualquiera. Cuando abre el pequeño sobre que acompaña al texto, siguiendo las instrucciones que figuran en la propia carta, se da cuenta de que el número allí escrito es exactamente en el que había pensado. David Gurney, un policía que después de 25 años de servicio se ha retirado al norte del Estado de Nueva York con su esposa, se verá involucrado en el caso cuando un conocido, el que ha recibido la carta, le pide ayuda para encontrar a su autor con urgencia. Pero lo que en principio parecía poco más que un chantaje se ha acabado convirtiendo en un caso de asesinato que además guarda relación con otros sucedidos en el pasado. Gurney deberá desentrañar el misterio de cómo este criminal parece capaz de leer la mente de sus víctimas en primer lugar, para poder llegar a establecer el patrón que le permita atraparlo.", "categoria"=>"thriller", "editorial"=>"ROCA EDITORIAL DE LIBROS","foto"=>"img8/12.jpg", "precio"=>4.09),
    array("ISBM"=>8491292667, "titulo"=>"La chica de nieve", "descripcion"=>"Nueva York, 1998, cabalgata de Acción de Gracias. Kiera Templeton, desaparece entre la multitud. Tras una búsqueda frenética por toda la ciudad, alguien encuentra unos mechones de pelo junto a la ropa que llevaba puesta la pequeña.", "categoria"=>"thriller", "editorial"=>"","foto"=>"img8/13.jpg", "precio"=>17.95),
    array("ISBM"=>9788491394723, "titulo"=>"ROTOS", "descripcion"=>"En estas seis inquietantes e intensas novelas cortas, Don Winslow regresa a los temas que se han convertido en su sello: el crimen, la corrupción, la venganza, la justicia, la pérdida, la traición, la culpa y la redención, para explorar el lado más salvaje pero también el más noble de la naturaleza humana.", "categoria"=>"thriller", "editorial"=>"HARPERCOLLINS","foto"=>"img8/14.jpg", "precio"=>20.85),
    array("ISBN"=> 8497592204,"titulo" => "Cien años de soledad", "descripcion"=>"«Muchos años después, frente al pelotón de fusilamiento, el coronel Aureliano Buendía había de recordar aquella tarde remota en que su padre lo llevó a conocer el hielo. Macondo era entonces una aldea de veinte casas de barro y cañabrava construidas a la orilla de un río de aguas diáfanas que se precipitaban por un lecho de piedras pulidas, blancas y enormes como huevos prehistóricos. El mundo era tan reciente, que muchas cosas carecían de nombre, y para mencionarlas había que señalarlas con el dedo.»", "categoria"=>"distopica", "editorial"=>"Debolsillo ", "foto"=>"img8/5.jpg", "precio"=>20.80),
    array("ISBM"=> 8490321477, "titulo"=>"Fahrenheit 451", "descripcion"=>"Fahrenheit 451 cuenta la historia de un sombrío y horroroso futuro. Montag, el protagonista, pertenece a una extraña brigada de bomberos cuya misión, paradójicamente, no es la de sofocar incendios, sino la de provocarlos para quemar libros. Porque en el país de Montag está terminantemente prohibido leer. Porque leer obliga a pensar, y en el país de Montag está prohibido pensar. Porque leer impide ser ingenuamente feliz, y en el país de Montag hay que ser feliz a la fuerza...", "categoria"=>"distopica", "editorial"=>"DEBOLSILLO ","foto"=>"img8/15.jpg", "precio"=>9.45),
    array("ISBM"=> 9788499890944, "titulo"=>"1984", "descripcion"=>"«No creo que la sociedad que he descrito en1984 necesariamente llegue a ser una realidad, pero sí creo que puede llegar a existir algo parecido», escribía Orwell después de publicar su novela. Corría el año 1948, y la realidad se ha encargado de convertir esa pieza -entonces de ciencia ficción- en un manifiesto de la realidad.", "categoria"=>"distopica", "editorial"=>"DEBOLSILLO ","foto"=>"img8/16.jpg", "precio"=>9.45),
    array("ISBM"=> 9788497594257, "titulo"=>"un mundo feliz", "descripcion"=>"La novela describe un mundo en el que finalmente se han cumplido los peores vaticinios del capitalismo: triunfan los dioses del consumo y la comodidad, y el orbe se divide en diez zonas en apariencia seguras y estables. Sin embargo, se han sacrificado valores humanos esenciales, y los habitantes se crean in vitro con una tecnica concebida a imagen y semejanza de una cadena de montaje.", "categoria"=>"distopica", "editorial"=>"DEBOLSILLO ","foto"=>"img8/17.jpg", "precio"=>9.45)
);

function pintarCategoria($categoria, $libreria){

    
    echo "<div class = 'padre'>";
    echo "<h1 class = 'titulo'>$categoria</h1><br>";
        foreach($libreria as $libro){
            if($libro ['categoria']==$categoria){
            
            echo "<div class='libro'>";
            echo '<img src="'.$libro["foto"].'" class="img" alt="...">';
            echo '<div class="col-20 row-10 text-truncate">';
            echo '<span class="card-text d-inline-block text-truncate  style="max-width: 400px; font-size:10px ">'.$libro["descripcion"].'</span>';
            echo '</div>';
            echo "<p>".$libro['titulo']."</p>";
            echo "<p class = 'precio'>".$libro['precio']."€</p>";
            echo "</div>";
            }
        }
        
        echo "</div>";
}

//Comprobaciones
pintarCategoria("historia",$libreria);
pintarCategoria("novela negra",$libreria);
pintarCategoria("thriller",$libreria);
pintarCategoria("distopica",$libreria);
?>
