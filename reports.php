
<?php
require('fpdf/fpdf.php');
include("dataconnection.php");



class PDF extends FPDF
{
    // Page header
    function Header()
    {
        $PageName=$_GET["pdfPHP"];
        // Arial bold 15
        $this->SetFont('Arial','B',12);
        // Move to the right
        $this->Cell(65);
        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }
}

$pdf=new PDF('p','mm','A4');
$pdf->AddPage();
$PageName=$_GET["pdfPHP"];
$pdf->SetFont('Arial','B',14);
$pdf->SetFillColor(240,255,240);
$pdf->SetDrawColor(0, 0, 0);
$pdf->Image('img_landingpage/logo.png',10,10,-300);
$pdf->Cell(85 ,35,'',0,0);



// START of Top Cell
if($PageName=="total_sales_report")
{
    $pdf->Cell(100 ,5,'Educator Earning Report',0,0);
    $pdf->Cell(100 ,10,'',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(12,5,'Id',1,0,'C',true);
    $pdf->Cell(150,5,'Educator Name',1,0,'C',true);
    $pdf->Cell(35,5,'Grand Total (RM)',1,1,'C',true);
    $pdf->SetFont('Arial','',12);
}
// END of Top Cell


if($PageName=="total_sales_report")
{
	
    $pdf->SetFont('Arial','',12);
	$edu= mysqli_query($connect, "SELECT * from educator");
	$row= mysqli_fetch_assoc($edu);
	do
	{
        $pdf->Cell(12,5,$row['educator_id'],1,0,'');
        $pdf->Cell(150,5,$row['educator_name'],1,0,'');
								$course= mysqli_query($connect, "SELECT * from course where educator_id='$row[educator_id]'");
								$row_course= mysqli_fetch_assoc($course);
								$course_c= mysqli_query($connect, "SELECT course_id from course where educator_id='$row[educator_id]'");
								$count_course = mysqli_num_rows($course_c);
								$total = 0;
								if($count_course != 0)
								{
									do
									{
										$pur= mysqli_query($connect, "SELECT * from purchasing_new where course_id='$row_course[course_id]'");
										$row_pur= mysqli_fetch_assoc($pur);
										$pur_c= mysqli_query($connect, "SELECT purchasing_id from purchasing_new where course_id='$row_course[course_id]'");
										$count_pur= mysqli_num_rows($pur_c);
										if($count_pur != 0)
										{
											$add = $row_pur["amount"];
										}
										else
										{
											$add = 0;
										}
										$total = $total + $add;
									}while($row_course= mysqli_fetch_assoc($course));
									$pdf->Cell(35,5,$total * 0.8,1,1,'');
								}
								else
								{
									$pdf->Cell(35,5,0,1,1,'');
								}
        
    }while($row= mysqli_fetch_assoc($edu));
						$price = "Select SUM(amount) as total_s from purchasing_new";
						$result_price = mysqli_query($connect,$price);
						$row_price = mysqli_fetch_array($result_price);
						$pdf->Cell(47 ,5, 'C-Learn-Y Earning = RM',0,0);
	$pdf->Cell(100 ,5, $row_price["total_s"] * 0.2,0,0);	
}

// END of Dispaly Data

$pdf->Output();
Output('F','$PageName.pdf');
?>