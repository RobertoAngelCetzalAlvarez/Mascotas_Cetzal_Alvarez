<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//hacemos referencia a la clase fpdfx
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\Mascota;
class PdfController extends Controller
{
    public function pdf(){

        //OBTENEMOS EL LISTADO DE MASCOTAS

        $mascotas=Mascota::all();
        //return $mascotas;


        // iniciamos la clase
    $pdf=new Fpdf('P','mm','Letter');

    //Agregamos una pagina
    $pdf->AddPage();

    //selleccionar una fuente
    $pdf->SetFont('Courier','B',18);
    $alt=10;
    //cuerpo del reporte
    //cell imprime una celda
    $pdf->Image(public_path().'/imagenes/logos/logo.jpg', 10, 10, 30);
    $pdf->Ln(5);
    $pdf->cell(188,7,'LISTADO DE MASCOTAS','B',1,'C');
    $pdf->Ln(5);

    $pdf->SetFont('Courier','B',12);
    //celda de margen
    $pdf->Cell(24,5,'',0,0);
    $pdf->SetFillColor(255, 195, 0);
    $pdf->Cell(10,$alt,'No',1,0,'C');
    $pdf->Cell(50,$alt,'Nombre',1,0,'C');
    $pdf->Cell(20,$alt,'Edad',1,0,'C');
    $pdf->Cell(20,$alt,'Peso',1,0,'C');
    $pdf->Cell(20,$alt,'Genero',1,0,'C');
    $pdf->Cell(20,$alt,'Especie',1,1,'C');


    //TABLA DE DATOS
     /*celda de margen
    for ($i=1; $i <10 ; $i++) { 
        
        // code...
    $pdf->Cell(35,5,'',0,0);

    $pdf->Cell(10,5,"$i",1,0,'C');
    $pdf->Cell(50,5,"Mascota$i",1,0,'L');
    $pdf->Cell(20,5,'8',1,0,'C');
    $pdf->Cell(20,5,'23',1,0,'C');
    $pdf->Cell(25,5,'H',1,1,'C');
    }*/










    foreach ($mascotas as $m) {
        // code...
    $pdf->Cell(24,5,'',0,0);

    $pdf->Cell(10,$alt,$m->id_mascota,1,0,'C');
    $pdf->Cell(50,$alt,utf8_decode($m->nombre),1,0,'L');
    $pdf->Cell(20,$alt,$m->edad,1,0,'C');
    $pdf->Cell(20,$alt,$m->peso,1,0,'C');
    $pdf->Cell(20,$alt,$m->genero,1,0,'C');
    $pdf->Cell(20,$alt,utf8_decode($m->especie->especie),1,1,'L');
    }

    

    //cierre del reporte
    $pdf->Output('I','Listado de Mascotas.pdf');
    exit;

    }
}
 