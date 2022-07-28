<?php
include '../commons/fpdf181/fpdf.php';
include '../model/patient_model.php';
$patientObj=new Patient();
$patientResult=$patientObj->getTodayPatients();
$fpdf=new FPDF();
$fpdf->SetTitle("All Patients Report");
$fpdf->AddPage("p","A4","0");

// set the font
$fpdf->SetFont("Helvetica","U","12");
$fpdf->Cell("0","30","Patient Report","0","1","C");
$fpdf->Image("../images/new.png","20","10","40");

$fpdf->SetFont("Arial","","10");
$fpdf->Cell("30","25","Patient Id","1","0","C");
$fpdf->Cell("40","25","patient Name","1","0","C");
$fpdf->Cell("40","25","Doctor Name","1","0","C");
$fpdf->Cell("50","25","Date","1","0","C");
$fpdf->Cell("30","25","Contact Number","1","1","C");

$counter=0;
$imgypos=30;
while ($patientRow=$patientResult->fetch_assoc()) {
    $counter++;
    $fpdf->Cell("30", "20",$patientRow["patient_id"], "1", "0", "C");
    $fpdf->Cell("40","20",$patientRow["patient_fname"]." ".$patientRow["patient_lname"],1,0,"C");
    $fpdf->Cell("40", "20",$patientRow["emp_fname"]." ".$patientRow["emp_lname"], "1", "0", "C");
    $fpdf->Cell("50","20",$patientRow["appointment_date"],1,0,"C");
    $fpdf->Cell("30","20",$patientRow["patient_cno"],1,1,"C");

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


