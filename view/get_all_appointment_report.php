<?php
include '../commons/fpdf181/fpdf.php';
include '../model/appointment_model.php';
$appointmentObj=new Appointment();
$appointmentResult=$appointmentObj->getAllReportAppointments();
$fpdf=new FPDF();
$fpdf->SetTitle("All Appointment Report");
$fpdf->AddPage("p","A4","0");

// set the font
$fpdf->SetFont("Helvetica","U","12");
$fpdf->Cell("0","30","Appointment Report","0","1","C");
$fpdf->Image("../images/new.png","20","10","40");

$fpdf->SetFont("Arial","","10");
$fpdf->Cell("30","25"," Id","1","0","C");
$fpdf->Cell("40","25","Date","1","0","C");
$fpdf->Cell("40","25","Patient Name","1","0","C");
$fpdf->Cell("40","25","Doctor","1","0","C");
$fpdf->Cell("40","25","Treatment Type","1","1","C");

$counter=0;
$imgypos=30;
while ($Row=$appointmentResult->fetch_assoc()) {
    $counter++;
    $fpdf->Cell("30", "20",$Row["appointment_id"], "1", "0", "C");
    $fpdf->Cell("40","20",$Row["appointment_date"],1,0,"C");
    $fpdf->Cell("40", "20",$Row["patient_fname"]." ".$Row["patient_lname"], "1", "0", "C");
    $fpdf->Cell("40", "20",$Row["emp_fname"]." ".$Row["emp_lname"], "1", "0", "C");
    $fpdf->Cell("40","20",$Row["treatment_name"],1,1,"C");

    $imgypos+=15;
    if($counter%10==0)
    {
        $imgypos=10;
    }
}
if(!isset($_GET["status"])){
    $fpdf->Output();
}
else{
    $date=date("Y-m-d");
    $d1=$date."";
    $filename="user_report_$d1.pdf";
    $path="../documents/user_reports/$filename";
    $fpdf->Output("$filename.pdf","D");
    $fpdf->Output();

}



