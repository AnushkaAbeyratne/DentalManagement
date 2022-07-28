<?php
    include '../commons/fpdf181/fpdf.php';
    include '../model/appointment_model.php';
    $appointmentObj=new Appointment();
    $appResult=$appointmentObj->dateAppointments();
    $fpdf=new FPDF();
    $fpdf->SetTitle("Appointment Report");
    $fpdf->AddPage("p","A4","0");

    // set the font
    $fpdf->SetFont("Helvetica","b","14");
    $fpdf->Cell("0","25","Appointment Report 2021-04-18 to 2021-05-10","0","1","C");
    $fpdf->Image("../images/new.png","10","10","40");

    $fpdf->SetFont("Arial","","10");
    $fpdf->Cell("10","18","Id","1","0","L");
    $fpdf->Cell("30","18","Date","1","0","L");
    $fpdf->Cell("60","18","Patient Name","1","0","L");
    $fpdf->Cell("50","18","Dentist Name","1","0","L");
    $fpdf->Cell("40","18","Treatment Type","1","1","L");

    $counter=0;
    $imgypos=60;
    while ($row=$appResult->fetch_assoc()) {
        $counter++;
        $fpdf->Cell("10", "18", "$counter", "1", "0", "L");
        $fpdf->Cell("30", "18", $row["appointment_date"], 1, 0, "L");
        $fpdf->Cell(60, 18, $row["patient_fname"] . " " . $row["patient_lname"], 1, 0, "L");
        $fpdf->Cell(50, 18, $row["emp_fname"] . " " . $row["emp_lname"], 1, 0, "L");
        $fpdf->Cell(40, 18, $row["treatment_name"], 1, 1, "L");
    }

        $fpdf->SetFont("Arial","B","14");
        $fpdf->Cell(80,10,"",0,1,"C");////// <br>
        $fpdf->Cell(80,10,"Terms and Conditions",0,1,"L");
        $fpdf->SetFont("Arial","","9");

        $fpdf->Cell(80,10,"*This is a computer generated document therefore, it requires no physical signature",0,1,"L");

        $fpdf->Cell(80,5,"..........................................",0,1,"L");
        $fpdf->Cell(80,5,"Receptionist",0,1,"L");


        $imgypos+=20;
        if($counter%10==0)
        {
            $imgypos=10;
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
