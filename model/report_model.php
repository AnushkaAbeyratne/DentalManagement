<?php
include_once '../commons/dbConnection.php';
$dbConnection = new dbConnection();
class report
{
    function invoice($invoice_id)
    {
        $con = $GLOBALS["con"];
        $sql = "SELECT i.invoice_id,p.patient_fname,p.patient_lname,e.emp_fname,e.emp_lname,i.invoice_date,i.invoice_time,t.treatment_name,t.treatment_price,i.invoice_total FROM invoice i, employee e, patient p, appointment a, treatment t WHERE i.employee_emp_id=e.emp_id AND i.patient_patient_id=p.patient_id AND i.treatment_treatment_id=t.treatment_id AND i.appointment_appointment_id=a.appointment_id AND i.invoice_id='$invoice_id'";
        $result=$con->query($sql) or die($con->error);
        return $result;
    }

    function sales($Invoice_invoice_id)
    {
        $con = $GLOBALS["con"];
        $sql = "SELECT m.item_name,im.qty,im.selling_price,im.paid_amount FROM invoice_has_medicine_item im, medicine_item m WHERE im.medicine_item_item_id=m.item_id AND Invoice_invoice_id='$Invoice_invoice_id'";
        $result=$con->query($sql) or die($con->error);
        return $result;
    }



}