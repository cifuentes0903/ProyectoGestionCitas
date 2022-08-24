<?php
require('fpdf/fpdf.php');
class PDF extends FPDF
{
    function Header()
    {
        $this->Image('imagenes/biblioteca.png',10,8,33);
        $this->SetFont('Arial','B',15);
        $this->Cell(60);
        $this->Cell(70,10,'REPORTE DE USUARIOS',0,0,'C');
        $this->Ln(32);
        $this->Cell(30,10,'Codigo',1,0,'C',0);
        $this->Cell(50,10,'Usuario',1,0,'C',0);
        $this->Cell(50,10,'Email',1,0,'C',0);
        $this->Cell(60,10,'Rol',1,1,'C',0);
        
             
    }
    function Footer() 
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10, utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
    }
}
$Conexion= mysqli_connect("localhost","root","","gestionsena2022")or die("problemas con la conexion");

$Resultado = mysqli_query($Conexion,"SELECT * FROM usuario")or die("Problema al realizar la consulta".
                mysqli_error($Conexion));
$Total = mysqli_query($Conexion,"SELECT COUNT(*) AS cantidad FROM usuario");
$resul = mysqli_fetch_array($Total);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

 while($row = mysqli_fetch_assoc($Resultado)){
    
         $pdf->Cell(30,10,$row['Codusuario'],1,0,'C',0);
         $pdf->Cell(50,10,$row['usuario'],1,0,'C',0);
         $pdf->Cell(50,10,$row['Email'],1,0,'C',0);
         $pdf->Cell(60,10,$row['Rol'],1,1,'C',0);
    
        }

$pdf->Cell(190,10,'Total de usuarios :'.$resul['cantidad'],1,1,'C',0);
$pdf->Output();


?>

