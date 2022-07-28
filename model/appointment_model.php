<?php
include_once '../commons/dbConnection.php';
$dbConnection = new dbConnection();

class Appointment{

    function addAppointment($appointment_date,$patient_patient_id,$timeslot_timeslot_id,
                            $treatment_treatment_id,$employee_emp_id) {
        $con=$GLOBALS["con"];
        $sql="INSERT INTO appointment(appointment_date,
                            patient_patient_id,
                            timeslot_timeslot_id,
                            treatment_treatment_id,
                            employee_emp_id
                            )VALUES(
                            '$appointment_date','$patient_patient_id','$timeslot_timeslot_id','$treatment_treatment_id','$employee_emp_id')";
        $sql1="UPDATE timeslot SET status=1 WHERE timeslot_id='$timeslot_timeslot_id'";
        $result=$con->query($sql);
        $result1=$con->query($sql1);
        return $result;

    }
    function getAllAppointment()
    {
        date_default_timezone_set("Asia/Colombo");
        $date = date("Y-m-d");
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM appointment a, patient p, employee e, timeslot t, treatment tr WHERE a.patient_patient_id=p.patient_id
            AND a.employee_emp_id=e.emp_id AND a.timeslot_timeslot_id=t.timeslot_id AND a.treatment_treatment_id=tr.treatment_id
             AND a.appointment_date>='$date' AND a.appointment_status!=0";
        $result=$con->query($sql);
        return $result;
    }

    function getAllReportAppointments()
    {
        date_default_timezone_set("Asia/Colombo");
        $date = date("Y-m-d");
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM appointment a, patient p, employee e, timeslot t, treatment tr WHERE a.patient_patient_id=p.patient_id
            AND a.employee_emp_id=e.emp_id AND a.timeslot_timeslot_id=t.timeslot_id AND a.treatment_treatment_id=tr.treatment_id";
        $result=$con->query($sql);
        return $result;
    }

    function getAllTreatment()
    {
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM treatment";
        $result=$con->query($sql);
        return $result;
    }
    function dateAppointments(){
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM appointment a,patient p, employee e, treatment tr WHERE a.patient_patient_id=p.patient_id AND 
              a.employee_emp_id=e.emp_id AND a.treatment_treatment_id=tr.treatment_id AND a.appointment_date BETWEEN '2021-04-18' AND '2021-05-10' 
              AND tr.treatment_name='Gum surgery'";
        $result=$con->query($sql);
        return $result;
    }






}