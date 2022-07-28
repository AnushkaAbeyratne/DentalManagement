<?php
include '../commons/fpdf181/fpdf.php';
include '../model/schedule_model.php';
$scheduleObj=new Schedule();
$scheduleResult=$scheduleObj->getAllSchedule();
$fpdf=new FPDF();
$fpdf->SetTitle("All Schedule Report");
$fpdf->AddPage("p","A4","0");

// set the font
$fpdf->SetFont("Helvetica","U","12");
$fpdf->Cell("0","30","All Schedule Report","0","1","C");
$fpdf->Image("../images/new.png","20","10","40");

$fpdf->SetFont("Arial","","10");
$fpdf->Cell("30","15","Id","1","0","C");
$fpdf->Cell("50","15","Doctor Name","1","0","C");
$fpdf->Cell("50","15","Date","1","0","C");
$fpdf->Cell("30","15","Start time","1","0","C");
$fpdf->Cell("30","15","End time","1","1","C");

$counter=0;
$imgypos=30;
while ($scheduleRow=$scheduleResult->fetch_assoc()) {
    $counter++;
    $fpdf->Cell("30", "20",$scheduleRow["schedule_id"], "1", "0", "C");
    $fpdf->Cell("50", "20",$scheduleRow["emp_fname"]." ".$scheduleRow["emp_lname"], "1", "0", "C");
    $fpdf->Cell("50", "20",$scheduleRow["schedule_date"], "1", "0", "C");
    $fpdf->Cell("30","20",$scheduleRow["start_time"],1,0,"C");
    $fpdf->Cell("30","20",$scheduleRow["end_time"],1,1,"C");

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



