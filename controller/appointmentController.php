<?php
include '../model/appointment_model.php';
$appointmentObj = new Appointment();
if(isset($_REQUEST["status"])) {


    $status = $_REQUEST["status"];
    switch ($status) {

        case "add_appointment":

             $appointment_date = $_POST["schedule_date"];
             $patient_patient_id = $_POST["patient_id"];
             $timeslot_timeslot_id = $_POST["schedule_time"];
             $treatment_treatment_id = $_POST["treatment_type"];
             $employee_emp_id = $_POST["dentist_id"];

            try {
                if ($patient_patient_id == "") {
                    throw new Exception("First Name Cannot be Empty!");
                }
                if ($employee_emp_id == "") {
                    throw new Exception("Last Name Cannot be Empty!");
                }
                if ($appointment_date == "") {
                    throw new Exception("NIC Cannot be Empty!");
                }
                if ($timeslot_timeslot_id == "") {
                    throw new Exception("DOB Cannot be Empty!");
                }
                if ($treatment_treatment_id == "") {
                    throw new Exception("Contact Number 2 Cannot be Empty!");
                }
                $appointmentId = $appointmentObj->addAppointment($appointment_date,$patient_patient_id,
                    $timeslot_timeslot_id,$treatment_treatment_id,$employee_emp_id);

                if ($appointmentId > 0) {
                    $msg = "Successfully Inserted Appointment";
                    $msg = base64_encode($msg);
                    ?>
                    <script>
                        window.location = "../view/view_appointment.php?msg=<?php echo $msg;?>"
                    </script>
                    <?php
                }
            }
            catch (Exception $ex)
            {
                $msg=$ex->getMessage();
                $msg=  base64_encode($msg);
                ?>
                <script>
                    window.location="../view/add_appointment.php?msg=<?php echo $msg;?>"
                </script>
                <?php

            }
            break;




    }


}



