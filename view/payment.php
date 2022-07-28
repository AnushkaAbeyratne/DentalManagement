<?php
include '../includes/header.php';
include '../model/payment_model.php';
$paymentObj = new Payment();
$paymentResult=$paymentObj->getConfirmAppointment();

?>
<title>PAYMENT</title>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h3 align="left" style="color: #006699"><img src="../images/payment-method.png" width="50px" height="50px"/> PAYMENT</h3>
        </div>

        <div class="col-md-4">
            <?php if (isset($_REQUEST["msg"])||(isset($_REQUEST["error"]))) { ?>
                <?php if (isset($_REQUEST["msg"])){?>
                    <div class="alert alert-success">
                        <?php echo base64_decode($_REQUEST["msg"]);?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }else {?>
                    <div class="alert alert-danger">
                        <?php echo base64_decode($_REQUEST["error"]);?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }?>
            <?php } ?>
            <div class="col-sm-12">
                <div id="alertDiv"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Appointment</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-responsive-*" id="myTable">
                <thead>
                <tr>
                    <th scope="col">App Id</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">App Date</th>
                    <th scope="col">App Time</th>
                    <th scope="col">Treatment Type</th>
                    <th scope="col">Option</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row=$paymentResult->fetch_assoc()){
                    $paymentId =$row ["appointment_id"];
                    $paymentId = base64_encode($paymentId);
                    ?>
                    <tr id="<?php echo $row ["appointment_id"]; ?>">
                        <td><?php echo $row ["appointment_id"]; ?></td>
                        <td><?php echo $row["patient_fname"] . " <br> " . $row['patient_lname']; ?></td>
                        <td><?php echo $row["emp_fname"]. " " . $row['emp_lname']; ?></td>
                        <td><?php echo $row["appointment_date"]; ?></td>
                        <td><?php echo $row["timeslot_start_time"]; ?></td>
                        <td><?php echo $row["treatment_name"]; ?></td>
                        <td>
                            <a href="generate_invoice.php?appointment_id=<?php echo $paymentId;?>" class="btn btn-outline-success">
                                <i class="fa fa-file-invoice-dollar"></i>&nbsp;Pay
                            </a>
                        </td>
                    </tr>
                    <?Php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../includes/footer.php';?>

