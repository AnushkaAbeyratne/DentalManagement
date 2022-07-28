<?php
include_once '../commons/dbConnection.php';
    $dbConnection=new dbConnection();
class Patient{

        function  getPatientId(){
           $con = $GLOBALS['con'];
           $sql = "SELECT patient_id FROM patient ORDER BY patient_id DESC LIMIT 1";
           $result = $con->query($sql);
           $rowCount = $result->num_rows;
           if ($rowCount==0 || $rowCount=""){
            $patient_id = "PAT00001";
            return $patient_id;
           }
           else{
               $Id = $result->fetch_array();
               $count = $Id[0];
               $count++;
               return $count;
           }
        }
//        function validateSameEmail($email){
//            $con=$GLOBALS["con"];
//            $sql="SELECT 1 FROM patient WHERE patient_email='$email'";
//            $result=$con->query($sql);
//            if ($result->num_rows>0)
//            {
//                return false;
//            }
//            else
//            {
//                return true;
//            }
//
//        }
        function addPatient($pat_id,$pat_title,$pat_fname,$pat_lname,$pat_gender,$pat_age, $pat_email,$pat_cno,$pat_no,$pat_street,$pat_city){
            $con=$GLOBALS["con"];
            $sql="INSERT INTO patient(patient_id,
                              patient_title,
                              patient_fname,
                              patient_lname,
                              patient_gender,
                              patient_age,
                              patient_email,
                              patient_cno,
                              patient_no,
                              patient_street,
                              patient_city
                              )VALUES (
                              '$pat_id','$pat_title','$pat_fname','$pat_lname','$pat_gender','$pat_age','$pat_email','$pat_cno',
                              '$pat_no','$pat_street','$pat_city')";
            $result=$con->query($sql)or die($con->error);
            $patientId=$con->insert_id;
            return $patientId;


        }
        function getAllPatients()
        {
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM patient";
        $result=$con->query($sql);
        return $result;
        }
        function viewPatients($patientId)
        {
            $con=$GLOBALS["con"];
            $sql="SELECT * FROM patient WHERE patient_id='$patientId'";
            $result=$con->query($sql);
            return $result;

        }

    function updatePatient($patient_id,$patient_title,$patient_fname,$patient_lname,$patient_gender,$patient_age,
                           $patient_email,$patient_cno,$patient_no,$patient_street,$patient_city)
    {
        $con = $GLOBALS['con'];
        $sql = "UPDATE patient SET "
                . "patient_title='$patient_title',"
                . "patient_fname='$patient_fname',"
                . "patient_lname='$patient_lname',"
                . "patient_gender='$patient_gender',"
                . "patient_age='$patient_age',"
                . "patient_email='$patient_email',"
                . "patient_cno='$patient_cno',"
                . "patient_no='$patient_no',"
                . "patient_street='$patient_street',"
                . "patient_city='$patient_city'"
                . "WHERE patient_id='$patient_id'";

        $result= $con->query($sql) or die($con->error);

    }

    function searchPatient($patient_id){
        $con=$GLOBALS["con"];
        $sql="SELECT patient_fname,patient_lname FROM patient WHERE patient_id='$patient_id'";
        $result=$con->query($sql);
        return $result;
    }

    function searchKeys($key){
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM patient WHERE patient_id LIKE '%$key%' OR patient_fname LIKE '%$key%' OR patient_lname LIKE '%$key%'";
        $result=$con->query($sql);
        return $result;

    }
    function addHistory($history_comment,$patient_id)
    {
        session_start();
        $emp_id = $_SESSION["user"]["emp_id"];
        date_default_timezone_set("Asia/Colombo");
        $date = date ("Y-m-d");
        $time = date("h:i:s");
        $con = $GLOBALS["con"];
        $sql = "INSERT INTO history(
                              history_date,
                              history_comment,
                              employee_emp_id,
                              patient_patient_id
                              )VALUES (
                              '$date','$history_comment','$emp_id','$patient_id')";
        $result = $con->query($sql) or die($con->error);
        $historyId = $con->insert_id;
        return $historyId;
    }

    function getAllHistory(){
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM history h, patient p WHERE h.patient_patient_id=p.patient_id GROUP BY p.patient_id";
        $result = $con->query($sql);
        return $result;
    }
    function updateHistory($history_comment,$patient_id)
    {
        session_start();
        $emp_id = $_SESSION["user"]["emp_id"];
        date_default_timezone_set("Asia/Colombo");
        $date = date ("Y-m-d");
        $con = $GLOBALS["con"];
        $sql = "UPDATE history SET"
                              ."history_date = '$date',"
                              ."history_comment ='$history_comment',"
                              ."employee_emp_id = '$emp_id',"
                              ."patient_patient_id = '$patient_id'"
                              . "WHERE history_id='$historyId'";
        $result = $con->query($sql) or die($con->error);
    }

    function getHistoryByDate($id)
    {
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM history h, patient p WHERE h.patient_patient_id=p.patient_id AND p.patient_id = '$id' ORDER BY history_date ";
        $result=$con->query($sql);
        return $result;
    }

    function getTodayPatients()
    {
        date_default_timezone_set('Asia/colombo');
        $date=date('Y-m-d');
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM appointment a,patient p,employee e WHERE a.patient_patient_id=p.patient_id AND a.employee_emp_id=e.emp_id AND appointment_date='$date' ";
        $result=$con->query($sql);
        return $result;
    }

    function getFromToPatients($from,$to)
    {
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM appointment a,patient p WHERE a.patient_patient_id=p.patient_id AND a.appointment_date BETWEEN '$from' AND '$to'";
        $result=$con->query($sql);
        return $result;
    }




}
