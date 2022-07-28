<?php
if(isset($_REQUEST["status"])) {
    include '../model/appointment_model.php';
    $appointmentObj = new Appointment();

    include '../model/payment_model.php';
    $paymentObj = new Payment();


    $status = $_REQUEST["status"];
    switch ($status) {

        case "add_invoice":

            $invoice_id = $_POST["invoice_id"];
            $appointment_id = $_POST["appointment_id"];
            $patient_id = $_POST["patient_id"];
            $dentist_id = $_POST["dentist_id"];
            $appointment_date = $_POST["appointment_date"];
            $schedule_time = $_POST["schedule_time"];
            $treatment_id = $_POST["treatment_id"];
            $treatment_price = $_POST["treatment_price"];
            $total = $_POST["total"];
            $item_id = $_POST["item_id"];
            $price = $_POST["price"];
            $qty = $_POST["qty"];
            $sub_total = $_POST["sub_total"];

            try {
                if ($invoice_id == "") {
                    throw new Exception("Invoice Id Cannot be Empty!");
                }
                if ($patient_id == "") {
                    throw new Exception("Patient Cannot be Empty!");
                }
                if ($dentist_id == "") {
                    throw new Exception("Dentist Cannot be Empty!");
                }
                if ($schedule_time == "") {
                    throw new Exception("Schedule time Cannot be Empty!");
                }
//                if ($treatment_type == "") {
//                    throw new Exception("Last Name Cannot be Empty!");
//                }
                if ($total == "") {
                    throw new Exception("Total Cannot be Empty!");
                }
                $invResult = $paymentObj->validateInvNumber($invoice_id);
                if($invResult===false){
                    throw new Exception("The invoice id already Inserted");
                }
                $paymentId = $paymentObj->addInvoice($invoice_id, $appointment_date, $dentist_id, $total, $patient_id, $appointment_id, $treatment_id);
                if ($paymentId > 0) {
                    for ($i = 0; $i < sizeof($item_id); $i++) {
                        $paymentObj->addInvoiceItem($invoice_id, $item_id[$i], $qty[$i], $price[$i], $sub_total[$i]);
                        $paymentResult = $paymentObj->stockCount($item_id[$i]);
                        $new = $qty[$i];
                        while ($row = $paymentResult->fetch_assoc()) {
                            if ($row['current_qty'] > $new) {
                                $new = $row['current_qty'] - $new;
                                $paymentObj->updateStockCount($row['batch_id'], $new);
                                break;
                            } else if ($row['current_qty'] == $new) {
                                $paymentObj->equalUpdateStockCount($row['batch_id']);
                                break;
                            } else if ($row['current_qty'] < $new) {
                                $new = $new - $row['current_qty'];
                                $paymentObj->equalUpdateStockCount($row['batch_id']);
                            }
                        }
                    }
                }
                $msg = "Successfully Payed";
                $msg = base64_encode($msg);
                ?>
                <script>
                    window.location = "../view/payment.php?msg=<?php echo $msg;?>";
                    window.open('../view/invoice.php?appointmentId=<?php echo base64_encode($invoice_id);?>', '_blank');
                </script>
                <?php
            }
            catch (Exception $ex) {
                $msg = $ex->getMessage();
                $msg = base64_encode($msg);
                ?>
                <script>
                    window.location = "../view/payment.php?error=<?php echo $msg;?>"
                </script>
                <?php
            }
            break;





    }
}
