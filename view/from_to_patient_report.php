<?php
include '../commons/fpdf181/fpdf.php';
include '../model/patient_model.php';
$from=$_REQUEST["from"];
$to=$_REQUEST["to"];
$patientObj = new Patient();
$patResult=$patientObj->getFromToPatients($from,$to);
$fpdf=new FPDF();
$fpdf->SetTitle("All Report");
$fpdf->AddPage("p","A4","0");

// set the font
$fpdf->SetFont("Helvetica","U","12");
$fpdf->Cell("0","30","Patient Report  ".$from." to ".$to,"0","1","C");
$fpdf->Image("../images/new.png","20","10","40");

$fpdf->SetFont("Arial","","10");
$fpdf->Cell("80","15","Patient Name","1","0","C");
$fpdf->Cell("50","15","Date","1","0","C");
$fpdf->Cell("50","15","Email","1","1","C");

$counter=0;

$imgypos=40;
while ($row=$patResult->fetch_assoc()) {
    $counter++;
    $fpdf->Cell("80","10",$row["patient_fname"]." ".$row["patient_lname"],1,0,"C");
    $fpdf->Cell("50","10",$row["appointment_date"],1,0,"C");
    $fpdf->Cell("50","10",$row["patient_email"],1,1,"C");


    $imgypos+=20;
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



