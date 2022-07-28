<?php
include '../commons/fpdf181/fpdf.php';
include '../model/employee_model.php';
$empObj=new Employee();
$empResult=$empObj->getAllEmployees();

$fpdf=new FPDF();
$fpdf->SetTitle("All Employees Report");
$fpdf->AddPage("p","A4","0");

// set the font
$fpdf->SetFont("Helvetica","U","12");
$fpdf->Cell("0","30","All Employees Report","0","1","C");
$fpdf->Image("../images/new.png","20","10","40");

$fpdf->SetFont("Arial","","10");
$fpdf->Cell("10","15","#","1","0","L");
$fpdf->Cell("40","15","Name","1","0","L");
$fpdf->Cell("50","15","Email","1","0","L");
$fpdf->Cell("50","15","NIC","1","0","L");
$fpdf->Cell("40","15","Contact Number","1","1","L");
$counter=0;
$imgypos=40;
while ($empRow=$empResult->fetch_assoc()) {
    $counter++;
    $fpdf->Cell("10", "10", "$counter", "1", "0", "L");
    $fpdf->Cell("40","10",$empRow["emp_fname"]." ".$empRow["emp_lname"],1,0,"L");
    $fpdf->Cell("50","10",$empRow["emp_email"],1,0,"L");
    $fpdf->Cell("50","10",$empRow["emp_nic"],1,0,"L");
    $fpdf->Cell("40","10",$empRow["emp_cno2"],1,1,"L");

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


