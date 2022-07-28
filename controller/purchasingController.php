<?php
if(isset($_REQUEST["status"])) {
    include '../model/purchasing_model.php';
    $purchaseObj = new Purchase();
    include '../model/medicine_item_model.php';
    $itemObj = new Items();

    $status = $_REQUEST["status"];
    switch ($status) {

        case "add_supplier":

            $companyName = $_POST["cname"];
            $con1 = $_POST["ccno1"];
            $con2 = $_POST["ccno2"];
            $email = $_POST["cemail"];
            $add_no = $_POST["add_no"];
            $add_street = $_POST["add_street"];
            $add_city = $_POST["add_city"];
            $personName = $_POST["pname"];
            $personEmail = $_POST["pemail"];
            $personCno1 = $_POST["pcno1"];
            $personCno2 = $_POST["pcno1"];
            $nic = $_POST["nic"];
            $position = $_POST["Position"];


            try {
                if ($companyName == "") {
                    throw new Exception("Company Name Cannot be Empty!");
                }
                if ($con1 == "") {
                    throw new Exception("Contact Number 1 Cannot be Empty!");
                }
                if ($con2 == "") {
                    throw new Exception("Contact Number 2 Cannot be Empty!");
                }
                if ($email == "") {
                    throw new Exception("Email Cannot be Empty!");
                }
                if ($add_no == "") {
                    throw new Exception("Address no Cannot be Empty!");
                }
                if ($add_street == "") {
                    throw new Exception("Address street Cannot be Empty!");
                }
                if ($add_city == "") {
                    throw new Exception("Address city Cannot be Empty!");
                }
                if ($personName == "") {
                    throw new Exception("Person Name Cannot be Empty!");
                }
                if ($personEmail == "") {
                    throw new Exception("Person Email Cannot be Empty!");
                }
                if ($personCno1 == "") {
                    throw new Exception("Person Contact Number 1 Cannot be Empty!");
                }
                if ($personCno2 == "") {
                    throw new Exception("person Contact Number 2 Cannot be Empty!");
                }
                if ($nic == "") {
                    throw new Exception("NIC Cannot be Empty!");
                }
                if ($position == "") {
                    throw new Exception("Position Cannot be Empty!");
                }

                $patnic = "/^[0-9]{9}[vVxX]$/";
                $patemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                $patcno = "/^\+94[0-9]{9}$/";
                $patmob = "/^\+947[0-9]{8}$/";

                if (!preg_match($patnic, $nic)) {
                    throw new Exception("Invalid NIC");
                }
                if (!preg_match($patemail, $email)) {
                    throw new Exception("Invalid Email Address");
                }
                if (!preg_match($patcno, $con1)) {
                    throw new Exception("Invalid Company Telephone Number");
                }
//                if (!preg_match($patcno, $personCno1)) {
//                    throw new Exception("Invalid Person Telephone Number");
//                }
                if (!preg_match($patmob, $con2)) {
                    throw new Exception("Invalid Company Telephone Number");
                }
//                if (!preg_match($patmob, $personCno2)) {
//                    throw new Exception("Invalid Person Telephone Number");
//                }

                /////   validating the existence of the email address

//                $isValid = $purchaseObj->validateEmail($email);
//
//                if ($isValid === false) {
//                    throw new Exception("Email Address is Already Taken!!!");
//
//                }

                $supId = $purchaseObj->addSupplier($companyName, $con1, $con2, $email,$add_no,$add_street,$add_city, $personName,
                    $personEmail, $personCno1, $personCno2, $nic, $position);

                if ($supId > 0) {
                    $msg = "Successfully Inserted Supplier";
                    $msg = base64_encode($msg);
                    ?>
                    <script>
                        window.location = "../view/view_supplier.php?msg=<?php echo $msg;?>"
                    </script>
                    <?php
                }
            } catch (Exception $ex) {
                $msg = $ex->getMessage();

                $msg = base64_encode($msg);
                ?>
                <script> window.location = "../view/add_supplier.php?msg=<?php echo $msg;  ?>"</script>
                <?php

            }

            break;

        case "edit_supplier":

            $supId = $_POST["sup_id"];
            $companyName = $_POST["cname"];
            $email = $_POST["cemail"];
            $con1 = $_POST["ccno1"];
            $con2 = $_POST["ccno2"];
            $add_no = $_POST["add_no"];
            $add_street = $_POST["add_street"];
            $add_city = $_POST["add_city"];
            $personName = $_POST["pname"];
            $personEmail = $_POST["pemail"];
            $personCno1 = $_POST["pcno1"];
            $personCno2 = $_POST["pcno1"];
            $nic = $_POST["nic"];
            $position = $_POST["Position"];


            try {
                if ($companyName == "") {
                    throw new Exception("Company Name Cannot be Empty!");
                }
                if ($con1 == "") {
                    throw new Exception("Contact Number 1 Cannot be Empty!");
                }
                if ($con2 == "") {
                    throw new Exception("Contact Number 2 Cannot be Empty!");
                }
                if ($email == "") {
                    throw new Exception("Email Cannot be Empty!");
                }
                if ($add_no == "") {
                    throw new Exception("Address no Cannot be Empty!");
                }
                if ($add_street == "") {
                    throw new Exception("Address street Cannot be Empty!");
                }
                if ($add_city == "") {
                    throw new Exception("Address city Cannot be Empty!");
                }
                if ($personName == "") {
                    throw new Exception("Person Name Cannot be Empty!");
                }
                if ($personEmail == "") {
                    throw new Exception("Person Email Cannot be Empty!");
                }
                if ($personCno1 == "") {
                    throw new Exception("Person Contact Number 1 Cannot be Empty!");
                }
                if ($personCno2 == "") {
                    throw new Exception("person Contact Number 2 Cannot be Empty!");
                }
                if ($nic == "") {
                    throw new Exception("NIC Cannot be Empty!");
                }
                if ($position == "") {
                    throw new Exception("Position Cannot be Empty!");
                }

                $patnic = "/^[0-9]{9}[vVxX]$/";
                $patemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";

                if (!preg_match($patnic, $nic)) {
                    throw new Exception("Invalid NIC");
                }
                if (!preg_match($patemail, $personEmail)) {
                    throw new Exception("Invalid Person Email Address");
                }
                if (!preg_match($patemail, $email)) {
                    throw new Exception("Invalid Company Email Address");
                }

                /////   validating the existence of the email address

//                $isValid = $purchaseObj->validateEmail($email);
//
//                if ($isValid === false) {
//                    throw new Exception("Email Address is Already Taken!!!");
//
//                }

                $purchaseObj->updateSupplier($supId,$companyName,$con1,$con2,$email, $add_no,$add_street,$add_city,
                    $personName, $personEmail, $personCno1, $personCno2, $nic, $position);

                if ($supId > 0) {
                    $msg = "Successfully Updated Supplier";
                    $msg = base64_encode($msg);
                    ?>
                    <script>
                        window.location = "../view/view_supplier.php?msg=<?php echo $msg;?>"
                    </script>
                    <?php
                }
            } catch (Exception $ex) {
                $msg = $ex->getMessage();
                $msg = base64_encode($msg);
                ?>
                <script>
                    window.location = "../view/add_supplier.php?msg=<?php echo $msg;?>"
                </script>
                <?php

            }
            break;

        case "add_grn":

            $grn_id = $_POST["grn_id"];
            $ref_id = $_POST["ref_id"];
            $supplier = $_POST["supplier"];
            $item = $_POST["productId"];
            $receive_date = $_POST["receiveDate"];
            $ex_date = $_POST["ex_date"];
            $r_price = $_POST["rPrice"];
            $s_price = $_POST["recQnt"];
            $qty = $_POST["cpUnit"];
            $p_amount = $_POST["payAnt"];
            $total = $_POST["total"];


            try {
                if ($grn_id == "") {
                    throw new Exception("GRN Id Cannot be Empty!");
                }
                if ($ref_id == "") {
                    throw new Exception("Ref Id Cannot be Empty!");
                }
                if ($supplier == "") {
                    throw new Exception("Please select supplier!");
                }
                if ($receive_date == "") {
                    throw new Exception("Please select Receive Date!");
                }
                if (empty($item)) {
                    throw new Exception("Please select Item!");
                }
                if (empty($ex_date)) {
                    throw new Exception("Please select expiry date!");
                }
                if (empty($r_price)) {
                    throw new Exception("Receive price Cannot be Empty!");
                }
                if (empty($s_price)) {
                    throw new Exception("Selling price Cannot be Empty!");
                }
                if (empty($qty)) {
                        throw new Exception("Qty cannot be empty");
                }
                if (empty($p_amount)) {
                    throw new Exception("Amount Cannot be Empty!");
                }
                $result = $purchaseObj->addGrn($grn_id, $ref_id, $total, $receive_date, $supplier);

                if ($result > 0) {
                    for ($x = 0; $x < sizeof($item); $x++) {
                        $purchaseObj->addStock($qty[$x], $receive_date, $ex_date[$x], $r_price[$x], $s_price[$x], $p_amount[$x], $item[$x], $grn_id);
                    }
                   $msg = "Successfully Inserted GRN";
                    $msg = base64_encode($msg);
                    ?>
                    <script>
                        window.location = "../view/view_inventory.php?msg=<?php echo $msg;?>"
                    </script>
                    <?php
                }
            } catch (Exception $ex) {
                echo $msg = $ex->getMessage();
                $msg = base64_encode($msg);
                ?>
                <script>
                    window.location = "../view/add_grn.php?msg=<?php echo $msg;?>"
                </script>
                <?php
            }
            break;

        case "get_price":
            $itemId = $_POST['batch_id'];
            $result = $itemObj->getPriceByItem($itemId);
            $price = $result->fetch_assoc();
            echo $price['price'];

            break;


        case "get_supplier":
            $supId = $_POST['supplier_sup_id'];
            $result = $itemObj->getSupplierByItem($supId);
            $output = "<option value=''>---</option>";
            while ($row = $result->fetch_assoc()) {
                $output .= "<option value='" . $row['sup_id'] . "'>" . $row['com_name'] . "</option>";
            }
            echo $output;
            break;
            }


}