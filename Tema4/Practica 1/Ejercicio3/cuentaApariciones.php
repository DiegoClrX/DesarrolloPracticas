<?php
$pagina = file_get_contents('https://edition.cnn.com/');
$pagina = explode(" ", $pagina);
//echo $pagina;
$num = 0;
foreach ($pagina as $palabra) {
    $palabra = strtolower($palabra);
    if ($palabra == "trump") {
        $num++;
    }
}
//print_r($pagina[5]);
escribirArchivo($pagina);
echo "numero de veces que sale la palabra Trump es ".$num;



function escribirArchivo($pagina)
{
    //Solo para que sea más eficiente y no abra y cierre el archivo cada vez que escribes
    foreach($pagina as $palabra){
        $file = fopen("numeroApariciones.txt", "c");

        if (flock($file, LOCK_EX)) {
           fwrite($file, "\n".$palabra, FILE_APPEND);
        }
    }
    echo "<script>alert('archivo creado');</script>";
    fflush($file);
    flock($file, LOCK_UN);
    fclose($file);
}
?>