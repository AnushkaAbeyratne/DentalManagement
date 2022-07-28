<?php
include_once '../commons/dbConnection.php';
$dbConnection = new dbConnection();

class Payment
{

    function getPaymentId()
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT invoice_id FROM invoice ORDER BY invoice_id DESC LIMIT 1";
        $result = $con->query($sql);
        $rowCount = $result->num_rows;
        if ($rowCount == 0 || $rowCount = "") {
            $invoice_id = "INV00001";
            return $invoice_id;
        } else {
            $Id = $result->fetch_array();
            $count = $Id[0];
            $count++;
            return $count;
        }
    }

    function getConfirmAppointment()
    {
        date_default_timezone_set('Asia/colombo');
        $date=date('Y-m-d');
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM appointment a,patient p, timeslot t, employee e, treatment tr WHERE a.patient_patient_id=p.patient_id AND a.timeslot_timeslot_id=t.timeslot_id AND a.employee_emp_id=e.emp_id AND a.treatment_treatment_id=tr.treatment_id AND a.appointment_status='1' AND a.appointment_date='$date'AND a.appointment_id NOT IN (SELECT appointment_appointment_id FROM invoice)";
        $result = $con->query($sql);
        return $result;
    }

    function viewAppointment($appointmentId)
    {
        $con = $GLOBALS["con"];
        $sql = "SELECT * FROM appointment a,patient p, timeslot t, employee e, treatment tr WHERE a.patient_patient_id=p.patient_id 
                    AND a.timeslot_timeslot_id=t.timeslot_id AND a.employee_emp_id=e.emp_id AND a.treatment_treatment_id=tr.treatment_id
                    AND a.appointment_id='$appointmentId'";
        $result = $con->query($sql);
        return $result;
    }


    function addInvoice($invoice_id,$invoice_date,$employee_emp_id,$invoice_total,$patient_patient_id,$appointment_appointment_id,$treatment_treatment_id)
    {
        date_default_timezone_set('Asia/colombo');
        $time=date('H:i:s',time());
        $con = $GLOBALS["con"];
        $sql = "INSERT INTO invoice(invoice_id,
                            invoice_time,
                            invoice_date,
                            employee_emp_id,
                            invoice_total,
                            patient_patient_id,
                            appointment_appointment_id,
                            treatment_treatment_id
                            )VALUES(
                            '$invoice_id','$time','$invoice_date','$employee_emp_id','$invoice_total','$patient_patient_id','$appointment_appointment_id','$treatment_treatment_id')";
        $result=$con->query($sql) or die($con->error);
        return $result;
    }

    function addInvoiceItem($Invoice_invoice_id,$medicine_item_item_id,$qty,$selling_price,$paid_amount)
    {
        $con = $GLOBALS["con"];
        $sql = "INSERT INTO invoice_has_medicine_item(Invoice_invoice_id,
                            medicine_item_item_id,
                            qty,
                            selling_price,
                            paid_amount
                            )VALUES(
                            '$Invoice_invoice_id','$medicine_item_item_id','$qty','$selling_price','$paid_amount')";
        $result=$con->query($sql) or die($con->error);
        return $result;
    }

    function stockCount($item_id)
    {
        $con=$GLOBALS["con"];
        $sql="SELECT current_qty,batch_id FROM stock  WHERE stock_status='1' AND medicine_item_item_id='$item_id'";
        $result=$con->query($sql);
        return $result;
    }

    function updateStockCount($batch_id,$new)
    {
        $con=$GLOBALS["con"];
        $sql="UPDATE stock SET current_qty='$new' WHERE batch_id='$batch_id'";
        $result=$con->query($sql);
        return $result;
    }

    function equalUpdateStockCount($batch_id)
    {
        $con=$GLOBALS["con"];
        $sql="UPDATE stock SET current_qty=0, stock_status=0 WHERE batch_id='$batch_id'";
        $result=$con->query($sql);
        return $result;
    }

    function validateInvNumber($invoice_id){
        $con=$GLOBALS["con"];
        $sql="SELECT 1 FROM invoice WHERE invoice_id ='$invoice_id'";
        $result= $con->query($sql);
        if($result->num_rows>0) {
            return false;

        }else {
            return true;
        }
    }
}
