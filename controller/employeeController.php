<?php
if(isset($_REQUEST["status"])) {
include '../model/employee_model.php';
$empObj = new Employee();

    $status = $_REQUEST["status"];
    switch ($status) {

        case "getmodule":
        $roleId=$_POST["role_id"] ;
        $moduleResult=$empObj->getModulesByRole($roleId);
        break;

        case "searchKey":
            $empId=$_POST["emp_id"];
            $empResult=$empObj->searchKey($empId);
            $result=$empResult->fetch_assoc();
            if ($result == "" && $result == NULL) {
                ?>
                <datalist id="searchEmp">
                    <option value="">
                </datalist>
                <?php
            } else {
                ?>
                <datalist id="searchEmp">
                    <option value="<?php echo $result["emp_id"]; ?>"><?php echo $result["emp_fname"] . ' ' . $result["emp_lname"];?></option>
                </datalist>
                <?php
            }
            break;

        case "searchEmployee":
            $empId = $_POST["emp_id"];
            $empResult = $empObj->searchEmployee($empId);
            $result = $empResult->fetch_assoc();
            echo json_encode($result);
            break;

        case "add_employee":

            $emp_id = $_POST["emp_id"];
            $emp_title = $_POST["emp_title"];
            $emp_fname = $_POST["emp_fname"];
            $emp_lname = $_POST["emp_lname"];
            $emp_nic = $_POST["emp_nic"];
            $emp_dob = $_POST["emp_dob"];
            $emp_email = $_POST["emp_email"];
            $emp_gender = $_POST["emp_gender"];
            $emp_cno1 = $_POST["emp_cno1"];
            $emp_cno2 = $_POST["emp_cno2"];

            try {
                if ($emp_id == "") {
                    throw new Exception("Emp Id Cannot be Empty!");
                }
                if ($emp_title == "") {
                    throw new Exception("Title Cannot be Empty!");
                }
                if ($emp_fname == "") {
                    throw new Exception("First Name Cannot be Empty!");
                }
                if ($emp_lname == "") {
                    throw new Exception("Last Name Cannot be Empty!");
                }
                if ($emp_nic == "") {
                    throw new Exception("NIC Cannot be Empty!");
                }
                if ($emp_dob == "") {
                    throw new Exception("DOB Cannot be Empty!");
                }
                if ($emp_email == "") {
                    throw new Exception("Email Cannot be Empty!");
                }
                if ($emp_gender == "") {
                    throw new Exception("Please Select your gender!");
                }
                if ($emp_cno1 == "") {
                    throw new Exception("Contact Number 1 Cannot be Empty!");
                }
                if ($emp_cno2 == "") {
                    throw new Exception("Contact Number 2 Cannot be Empty!");
                }
                $patcno="/^\+94[0-9]{9}$/";
                $patmob="/^\+947[0-9]{8}$/";
                $patnic = "/^[0-9]{9}[vVxX]$/";
                $patemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";

                if (!preg_match($patcno, $emp_cno1)) {
                    throw new Exception("Invalid Telephone Number");
                }
                if (!preg_match($patmob, $emp_cno2)) {
                    throw new Exception("Invalid Mobile Number");
                }
                if (!preg_match($patnic, $emp_nic)) {
                    throw new Exception("Invalid NIC");
                }
                if (!preg_match($patemail, $emp_email)) {
                    throw new Exception("Invalid Email Address");
                }
                // upload image///
                if ($_FILES["emp_image"]["name"] != "") {
                    $img = $_FILES["emp_image"]["name"];
                    $image_ext = substr($img, strripos($img, "."));
                    $img = $emp_id . "_" . time() . $image_ext;
                    /// obtain temporary location
                    $tmp = $_FILES["emp_image"]["tmp_name"];
                    $destination = "../images/user_image/$img";
                    move_uploaded_file($tmp, $destination);
                } else {
                    $img = "defaultImage.jpg";
                }
//                   validating the existence of the email address

                $isValid = $empObj->validateEmail($emp_email);
                if ($isValid === false) {
                    throw new Exception("Email Address is Already Taken!");
                }
                $empId = $empObj->addEmployee($emp_id,$emp_title,$emp_fname,$emp_lname,$img,$emp_email,$emp_nic,$emp_dob,
                    $emp_gender,$emp_cno1,$emp_cno2);

                $msg = "Successfully Inserted Employee $emp_fname" . " " . "$emp_lname";
                $msg = base64_encode($msg);
                ?>
                <script>
                    window.location = "../view/view_employee.php?msg=<?php echo $msg;?>"
                </script>
                <?php
            }
            catch (Exception $ex) {
                $msg = $ex->getMessage();
                $msg = base64_encode($msg);
                ?>
                <script> window.location = "../view/add_employee.php?msg=<?php echo $msg;?>"</script>
                <?php
            }
            break;

        case "deactivateEmployee":
            $empId = $_REQUEST["emp_id"];
            $empId = base64_decode($empId);
            $empObj->deactivateEmployee($empId);
            $msg = "User Successfully Deactivate!";
            $msg = base64_encode($msg);
            ?>
            <script>
                window.location = "../view/view_employee.php?msg=<?php echo $msg;?>"
            </script>
            <?php
            break;

        case "activateEmployee":
            $empId = $_REQUEST["emp_id"];
            $empId = base64_decode($empId);
            $empObj->activateEmployee($empId);
            $msg = "User Successfully Activate!";
            $msg = base64_encode($msg);
            ?>
            <script>
                window.location = "../view/view_employee.php?msg=<?php echo $msg;?>"
            </script>
            <?php

            break;

        case "add_users":

           try {
                 $emp_id = $_POST["emp_id"];
                 $emp_nic = $_POST["emp_nic"];
                 $emp_email = $_POST["emp_email"];
                 $roleId = $_POST["user_role"];

               if ($emp_id == "") {
                   throw new Exception("Please Select Emp Id!");
               }
                if ($roleId == "") {
                    throw new Exception("Please Select Role!");
                }

                $isValid = $empObj->loginExist($emp_id);

                if ($isValid=== false) {
                    throw new Exception("Already User Added!");
                }


                $password = sha1($emp_nic);
                $empObj->addLogin($emp_email,$password,$roleId,$emp_id);
                $msg = "Successfully Inserted User";
                $msg = base64_encode($msg);
                ?>
                <script>
                    window.location = "../view/view_user.php?msg=<?php echo $msg;?>"
                </script>
                <?php
            }
           catch (Exception $ex) {
                $msg = $ex->getMessage();
                $msg = base64_encode($msg);
                ?>
                <script>
                    window.location = "../view/add_user.php?msg=<?php echo $msg;?>"
                </script>
                <?php
           }
           break;


        case "edit_employee":
            $emp_id = $_POST["emp_id"];
            $emp_title = $_POST["emp_title"];
            $emp_fname = $_POST["emp_fname"];
            $emp_lname = $_POST["emp_lname"];
            $emp_nic = $_POST["emp_nic"];
            $emp_dob = $_POST["emp_dob"];
            $emp_email = $_POST["emp_email"];
            $emp_gender = $_POST["emp_gender"];
            $emp_cno1 = $_POST["emp_cno1"];
            $emp_cno2 = $_POST["emp_cno2"];

            try {
                if ($emp_id == "") {
                    throw new Exception("First Name Cannot Be Empty!");
                }
                if ($emp_title == "") {
                    throw new Exception("Title Cannot be Empty!");
                }
                if ($emp_fname == "") {
                    throw new Exception("First Name Cannot be Empty!");
                }
                if ($emp_lname == "") {
                    throw new Exception("Last Name Cannot be Empty!");
                }
                if ($emp_nic == "") {
                    throw new Exception("NIC Cannot be Empty!");
                }
                if ($emp_dob == "") {
                    throw new Exception("DOB Cannot be Empty!");
                }
                if ($emp_email == "") {
                    throw new Exception("Email Cannot be Empty!");
                }
                if ($emp_gender == "") {
                    throw new Exception("Please Select your gender!");
                }
                if ($emp_cno1 == "") {
                    throw new Exception("Contact Number 1 Cannot be Empty!");
                }
                if ($emp_cno2 == "") {
                    throw new Exception("Contact Number 2 Cannot be Empty!");
                }

                $patnic = "/^[0-9]{9}[vVxX]$/";
                $patemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";

                if (!preg_match($patnic, $emp_nic)) {
                    throw new Exception("Invalid NIC");
                }
                if (!preg_match($patemail, $emp_email)) {
                    throw new Exception("Invalid Email Address");
                }
                // upload image///
                if ($_FILES["emp_image"]["name"] != "") {
                    $img = $_FILES["emp_image"]["name"];
                    $image_ext = substr($img, strripos($img, "."));
                    $img = $emp_id . "_" . time() . $image_ext;
                    /// obtain temporary location
                    $tmp = $_FILES["emp_image"]["tmp_name"];
                    $destination = "../images/user_image/$img";
                    move_uploaded_file($tmp, $destination);

                } else {
                    $img = "defaultImage.jpg";
                }
                /////   validating the existence of the email address
//                $isValid = $empObj->updateEmailValidation($empId, $emp_email);
//                if ($isValid === false) {
//                    throw new Exception("Email Address is Already Taken!!!");
//                }
                $empObj->updateEmployee($emp_id,$emp_title,$emp_fname,$emp_lname,$img,$emp_email,$emp_nic,$emp_dob,
                    $emp_gender,$emp_cno1,$emp_cno2);

                $msg = "Successfully Updated Employee";
                $msg = base64_encode($msg);
                ?>
                <script>
                    window.location = "../view/view_employee.php?msg=<?php echo $msg;?>"</script>
                <?php

            }
            catch (Exception $ex) {
                $msg = $ex->getMessage();
                $msg = base64_encode($msg);
                ?>
                <script>
                    window.location = "../view/add_employee.php?msg=<?php echo $msg;?>"
                </script>
                <?php

            }
            break;

    }
}