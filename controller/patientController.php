<?php
if(isset($_REQUEST["status"])) {
    include '../model/patient_model.php';
    $patientObj = new Patient();

    $status = $_REQUEST["status"];
    switch ($status) {

        case "searchKeys":
            $patientId = $_POST["pat_id"];
            $patientResult = $patientObj->searchKeys($patientId);
            $result = $patientResult->fetch_assoc();
            if ($result == "" && $result == NULL) {
                ?>
                <datalist id="searchPatients">
                    <option value="">
                </datalist>
                <?php
            } else {
                ?>
                <datalist id="searchPatients">
                    <option value="<?php echo $result["patient_id"];?>"><?php echo $result["patient_fname"] . ' ' . $result["patient_lname"]; ?></option>
                </datalist>
                <?php
            }
            break;

        case "searchPatient":
            $patientId = $_POST["pat_id"];
            $patientResult = $patientObj->searchPatient($patientId);
            $result = $patientResult->fetch_assoc();
            echo json_encode($result);
            break;

        case "add_patient":
            $pat_id = $_POST["pat_id"];
            $pat_title = $_POST["pat_title"];
            $pat_fname = $_POST["pat_fname"];
            $pat_lname = $_POST["pat_lname"];
            $pat_gender = $_POST["pat_gender"];
            $pat_age = $_POST["pat_age"];
            $pat_email = $_POST["pat_email"];
            $pat_cno = $_POST["pat_cno"];
            $pat_no = $_POST["pat_no"];
            $pat_street = $_POST["pat_street"];
            $pat_city = $_POST["pat_city"];

            try {
                if ($pat_title == "") {
                    throw new Exception("Title cannot be Empty!!");
                }
                if ($pat_fname == "") {
                    throw new Exception("First Name cannot be Empty!!");
                }
                if ($pat_lname == "") {
                    throw new Exception("Last Name cannot be Empty!!");
                }
                if ($pat_gender == "") {
                    throw new Exception("Please select gender!!");
                }
                if ($pat_age == "") {
                    throw new Exception("Age cannot be Empty!!");
                }
                if ($pat_email == "") {
                    throw new Exception("Email cannot be Empty!!");
                }
                if ($pat_cno == "") {
                    throw new Exception("Contact Number cannot be Empty!!");
                }
                if ($pat_no == "") {
                    throw new Exception("No cannot be Empty!!");
                }
                if ($pat_street == "") {
                    throw new Exception("Street cannot be Empty!!");
                }
                if ($pat_city == "") {
                    throw new Exception("City cannot be Empty!!");
                }

                $patemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                $patmob="/^\+947[0-9]{8}$/";

                if (!preg_match($patemail, $pat_email)) {
                    throw new Exception("Invalid Email Address");
                }
                if (!preg_match($patmob, $pat_cno)) {
                    throw new Exception("Invalid Contact Number");
                }

//                ////validating existence of the email address
//                $isValid = $patientObj->validateSameEmail($pat_email);
//                if ($isValid == false) {
//                    throw new Exception("Email Address is Already Taken!!");
//                }
                $patientId = $patientObj->addPatient($pat_id,$pat_title,$pat_fname,$pat_lname,$pat_gender, $pat_age,
                    $pat_email,$pat_cno,$pat_no,$pat_street,$pat_city);

                $msg = "Successfully Inserted Patient $pat_fname"."  " .$pat_lname;
                $msg = base64_encode($msg);
                ?>
                <script> window.location = "../view/view_patient.php?msg=<?php echo $msg;  ?>"</script>
                <?php
            }
            catch (Exception $ex) {
                $msg = $ex->getMessage();
                $msg = base64_encode($msg);
                ?>
                <script>window.location = "../view/add_patient.php?msg=<?php echo $msg ?>"</script>
                <?php
            }

            break;

        case "edit_patient";

            $pat_id = $_POST["pat_id"];
            $pat_title = $_POST["pat_title"];
            $pat_fname = $_POST["pat_fname"];
            $pat_lname = $_POST["pat_lname"];
            $pat_gender = $_POST["pat_gender"];
            $pat_age = $_POST["pat_age"];
            $pat_email = $_POST["pat_email"];
            $pat_cno = $_POST["pat_cno"];
            $pat_no = $_POST["pat_no"];
            $pat_street = $_POST["pat_street"];
            $pat_city = $_POST["pat_city"];

            try {
                if ($pat_title == "") {
                    throw new Exception("Title cannot be Empty!!");
                }
                if ($pat_fname == "") {
                    throw new Exception("First Name cannot be Empty!!");
                }
                if ($pat_lname == "") {
                    throw new Exception("Last Name cannot be Empty!!");
                }
                if ($pat_gender == "") {
                    throw new Exception("Please select gender!!");
                }
                if ($pat_age == "") {
                    throw new Exception("Age cannot be Empty!!");
                }
                if ($pat_email == "") {
                    throw new Exception("Email cannot be Empty!!");
                }
                if ($pat_cno == "") {
                    throw new Exception("Contact Number cannot be Empty!!");
                }
                if ($pat_no == "") {
                    throw new Exception("No cannot be Empty!!");
                }
                if ($pat_street == "") {
                    throw new Exception("Street cannot be Empty!!");
                }
                if ($pat_city == "") {
                    throw new Exception("City cannot be Empty!!");
                }

                $patemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                $patmob="/^\+947[0-9]{8}$/";

                if (!preg_match($patemail, $pat_email)) {
                    throw new Exception("Invalid Email Address");
                }
                if (!preg_match($patmob, $pat_cno)) {
                    throw new Exception("Invalid Contact Number");
                }

                $patientObj->updatePatient($pat_id,$pat_title,$pat_fname,$pat_lname,$pat_gender,$pat_age,$pat_email,$pat_cno,$pat_no,$pat_street,$pat_city);
                $msg = "Successfully Updated Patient $pat_fname"."  " .$pat_lname;
                $msg = base64_encode($msg);
                ?>
                <script> window.location = "../view/view_patient.php?msg=<?php echo $msg;?>"</script>
                <?php
            }
            catch (Exception $ex)
            {
                $msg = $ex->getMessage();
                $msg = base64_encode($msg);
                ?>
                <script>window.location = "../view/add_patient.php?msg=<?php echo $msg ?>"</script>
                <?php
            }

            break;

        case "add_history":

            try {
                 echo $pat_id = $_POST["pat_id"];
                echo $history_comment = $_POST["his_comment"];

                if ($pat_id == "") {
                    throw new Exception("Please select patient Id!");
                }
                if ($history_comment == "") {
                    throw new Exception("Comment cannot be Empty!");
                }
                $patientId = $patientObj->addHistory($history_comment,$pat_id);
                $msg = "Successfully added history";
                $msg = base64_encode($msg);
                ?>
                <script>
                    window.location = "../view/view_history.php?msg=<?php echo $msg;?>"
                </script>
                <?php
            }
            catch (Exception $ex)
            {
                $msg = $ex->getMessage();
                $msg = base64_encode($msg);
                ?>
                <script>
                    window.location = "../view/add_history.php?msg=<?php echo $msg ?>"
                </script>
                <?php
            }
            break;


            case "edit_history":
                $patient_id = $_POST["patient_id"];
                $history_comment = $_POST["his_comment"];

            try {
                if ($patient_id == "") {
                    throw new Exception("Please select patient id!!");
                }
                if ($history_comment == "") {
                    throw new Exception("Comment cannot be Empty!!");
                }

                $patientObj->updateHistory($history_comment,$patient_id);
                $msg = "Successfully Updated History";
                $msg = base64_encode($msg);
                ?>
                <script> window.location = "../view/view_history.php?msg=<?php echo $msg;?>"</script>
                <?php
            }
            catch (Exception $ex)
            {
                $msg = $ex->getMessage();
                $msg = base64_encode($msg);
                ?>
                <script>window.location = "../view/edit_history.php?msg=<?php echo $msg ?>"</script>
                <?php
            }
            break;


    }
}








