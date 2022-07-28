<?php
include '../includes/header.php';
include '../model/appointment_model.php';
$appointmentObj = new Appointment();
$appointmentResult=$appointmentObj->getAllAppointment();

?>
<title>VIEW APPOINTMENT</title>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3 align="left" style="color: #006699"><img src="../images/calendar%20(1).png" width="50px" height="50px"/> VIEW APPOINTMENT</h3>
        </div>

        <div class="col-md-3">
            <?php if(isset($_GET["msg"])) {?>
                <div class="col-md-12">
                    <div class="alert alert-success">
                        <?php
                        $msg=$_REQUEST["msg"];
                        $msg=  base64_decode($msg);
                        echo $msg;
                        ?>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="col-sm-12">
                <div id="alertDiv"></div>
            </div>
        </div>
        <div class="col-md-3">
            <a href="add_appointment.php" class="btn btn-block btn-primary">
                <i class="fa fa-plus"></i>&nbsp;Add Appointment
            </a>
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
                        <th scope="col">Appointment Id</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Doctor Name</th>
                        <th scope="col">Appointment Date</th>
                        <th scope="col">Appointment Time</th>
                        <th scope="col">Treatment Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($appointmentResult!=null){
                    while ($appointmentRow=$appointmentResult->fetch_assoc()) {
                        $appointmentId = $appointmentRow ["appointment_id"];
                        $appointmentId = base64_encode($appointmentId);
                        ?>
                        <tr id="<?php echo $appointmentRow ["appointment_id"]; ?>">
                            <td><?php echo $appointmentRow ["appointment_id"]; ?></td>
                            <td><?php echo $appointmentRow["patient_fname"] . " " . $appointmentRow['patient_lname']; ?></td>
                            <td><?php echo $appointmentRow["emp_fname"] . " " . $appointmentRow['emp_lname']; ?></td>
                            <td><?php echo $appointmentRow["appointment_date"]; ?></td>
                            <td><?php echo $appointmentRow["timeslot_start_time"]; ?></td>
                            <td><?php echo $appointmentRow["treatment_name"]; ?></td>
                        </tr>

                        <?Php
                    }
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../includes/footer.php';?>
<script>
    var url = window.location.href;
    var spliturl = url.split("?")[0];
    var newspliturl = spliturl.split("localhost")[1];
    window.history.pushState({},document.title,"" + newspliturl);
</script>

