<?php

$arrayEs = array();

$word_list_es = array(
  "mesa",
  "esta",
  "ordenador",
  "movil",
  "teclado",
  "raton",
  "pizarra",
  "hola",
  "tenis",
  "pantalon",
  "camiseta",
  "felpudo",
  "radio",
  "la",
  "lapiz",
  "boligrafo",
  "mando",
  "caja",
  "cable",
  "internet",
  "electricidad",
  "aire",
  "viento",
  "lluvia",
  "nubes",
  "gafas",
  "negro",
  "blanco",
  "amarillo",
  "azul",
  "marron",
  "verde",
  "morado",
  "soporte",
  "compañero",
  "amigo",
  "madre",
  "padre",
  "novia",
  "abuela",
  "abuelo",
  "luz",
  "sol",
  "luna",
  "agua",
  "frio",
  "calor",
  "velocidad",
  "coche",
  "frenos",
  "calvo"
);

$word_list_en = array(
    "table",
    "this",
    "computer",
    "phone",
    "keyboard",
    "mouse",
    "blackboard",
    "hi",
    "tennis",
    "trousers",
    "t-shirt",
    "doormat",
    "radio",
    "the",
    "pencil",
    "pen",
    "send",
    "box",
    "cable",
    "internet",
    "electricity",
    "air",
    "wind",
    "rain",
    "clouds",
    "glasses",
    "black",
    "white",
    "yellow",
    "blue",
    "morron",
    "green",
    "purple",
    "support",
    "partner",
    "friend",
    "mom",
    "dad",
    "girlfrined",
    "grandmother",
    "grandpather",
    "light",
    "sun",
    "mon",
    "wather",
    "cold",
    "hot",
    "speed",
    "car",
    "brakes",
    "bald"
  );
  

  function traduccionEsEn($cadenaEs, $word_list_es, $word_list_en){
    $arrayEs = explode(" ",$cadenaEs);
    foreach ($arrayEs as $palabra){      
    $pos = array_search($palabra, $word_list_es);
    if($pos){
        echo $word_list_en[$pos]." ";
    }
    }
  }
  traduccionEsEn("hola calvo",$word_list_es, $word_list_en);
  $pos = array_search("calvo", $word_list_es);
  echo $pos;
?>