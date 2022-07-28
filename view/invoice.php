<?php
include '../commons/fpdf181/fpdf.php';
include '../model/report_model.php';
$reportObj = new report();
$appointment_id = $_REQUEST["appointmentId"];
$appointmentId = base64_decode($appointment_id);
$reportResult = $reportObj->invoice($appointmentId);
$reportResult1 = $reportObj->sales($appointmentId);
$row = $reportResult->fetch_assoc();
//$paymentNewId=$paymentObj->getPaymentId();

//pdf setup
$pdf = new fpdf('P','mm','A4');
$pdf->SetTitle("MY DENTAL CLINIC");
$pdf->SetFont("Arial","","12");

$pdf->AddPage();
//header of the bill
$pdf->Image("../images/new.png","20","10","40");
$pdf->Cell(0,30,"INVOICE","0","1","C");
$pdf->Cell(0,2,'',0,1);
$pdf->Cell(40,5,'Payment Id',0,0);
$pdf->Cell(20,5,$row['invoice_id'],0,1);
$pdf->Cell(40,10,'Patient Name',0,0);
$pdf->Cell(20,10,$row['patient_fname']." ".$row['patient_lname'],0,1);
$pdf->Cell(40,5,'Doctor Name',0,0);
$pdf->Cell(20,5,$row['emp_fname']." ".$row['emp_lname'],0,1);
$pdf->Cell(40,10,'Date',0,0);
$pdf->Cell(20,10,$row['invoice_date'],0,1);
$pdf->Cell(40,5,'Time',0,0);
$pdf->Cell(20,5,$row['invoice_time'],0,1);
$pdf->Cell(40,10,'Treatment Type',0,0);
$pdf->Cell(20,10,$row['treatment_name'],0,1);
$pdf->Cell(40,5,'Treatment Price',0,0);
$pdf->Cell(20,5,$row['treatment_price'],0,1);
//table header of the bill
$pdf->Cell(0,5,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont("Arial","B","12");
$pdf->Cell(40,5,'Item',0,0);
$pdf->Cell(40,5,'Qty',0,0);
$pdf->Cell(40,5,'Price',0,0);
$pdf->Cell(40,5,'Amount',0,1);
//
$pdf->SetFont("Arial","","12");
$pdf->Cell(0,5,'--------------------------------------------------------------------------------------------------------------------------------',0,1);
// content of the bill
while ($row1=$reportResult1->fetch_assoc()){
    $pdf->Cell(40,5,$row1['item_name'],0,0);
    $pdf->Cell(40,5,$row1['qty'],0,0);
    $pdf->Cell(40,5,$row1['selling_price'],0,0);
    $pdf->Cell(40,5,$row1['paid_amount'],0,1);
}
//total of the bill
$pdf->Cell(0,5,'---------------------------------------------------------------------------------------------------------------------------------',0,1);
$pdf->Cell(150,5,'Net Total',0,0,'R');
$pdf->Cell(80,5,$row['invoice_total'],0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->Cell(0,5,'',0,1);
//footer of the bill
$pdf->Cell(0,5,'THANK YOU ! Come Again',0,1,'C');

$pdf->Output();
