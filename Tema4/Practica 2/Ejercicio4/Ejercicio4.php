<?php
session_start();
require_once 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {   
    
    //Estilo
    $content = '
    <style type="text/css">
    <!--
    page{
        background-image: url("imagenes4/fondo.png");
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
    }
    table,td,th {
        border: solid 1px #437ad3;
    table
    {
        padding: 0;
        font-size: 12pt;
        text-align: center;
        vertical-align: middle;
        border-collapse: collapse;
    }
    td
    {
        padding: 1mm;
        width: 150px;
    }
    td.right {
        text-align: right;
        padding-right: 30px;
    }

    -->
    </style>    
        ';


    //Tabla
    $content .= '
    <page backcolor="#FFFFFA" backleft="5mm" backright="5mm" backtop="10mm" backbottom="10mm" >
    <h1>Empresa Ser Policia</h1>
    <h4>Factura xxxxxxxxx</h4>
    <table cellspacing="4">
    ';    

    $content .= '<tr><th>Producto</th><th>precio</th><th>cantidad</th><th>Subtotal</th></tr>';

    $total = 0;
    foreach($_SESSION['carrito'] as $value) {
        $content .= "<tr><td>".$value['nombre']."</td>
                         <td>".$value['precio']."€</td>
                         <td>".$value['cantidad']."</td>
                         <td>".($value['precio']*$value['cantidad'])."€</td></tr>";
        $total += ($value['precio']*$value['cantidad']);
    }

    $content .= "<tr><td>TOTAL (con IVA)</td><td colspan='3' class='right'>".$total*1.21."€</td></tr>";

    $content .= "
    </table>
    </page>
    ";
    
    $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 0);
    $html2pdf->writeHTML($content);
    file_put_contents("serPolicia.pdf", $html2pdf->output('serPolicia.pdf', 'S'));
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}