<?php
include '../includes/header.php';
include '../model/patient_model.php';
    $patientObj = new Patient();
    if(!isset($_REQUEST["patient_id"]))
    {
        ?>
        <script> window.location="../index.php"</script>
        <?php
    }
    $patientId = $_REQUEST["patient_id"];
    $patientId = base64_decode($patientId);
    $patientResult = $patientObj->viewPatients($patientId);
    $patientRow = $patientResult->fetch_assoc();

?>
<title>PATIENT DETAILS</title>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <h3 align="left" style="color: #006699"><img src="../images/details.png" width="60px" height="60px"/> PATIENT DETAILS</h3>
        </div>

        <div class="col-md-6">
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
            <?php   }  ?>
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
                    <li class="breadcrumb-item"><a href="view_patient.php">View Patient</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Patient Details</li>
                </ol>
            </nav>
        </div>
    </div>
    <br>
    <form id="addPatient" enctype="multipart/form-data" method="post" action="../controller/patientController.php?status=add_patient">
        <div class="row">
            <div class="col-md-3 ">
                <label class="control-label">Name &nbsp;</label>
            </div>
            <div class="col-md-3">
                <label class="control-label"><?php echo $patientRow["patient_fname"]." ".$patientRow["patient_lname"];  ?></label>
            </div>
            <div class="col-md-3 ">
                <label class="control-label">Email &nbsp;</label>
            </div>
            <div class="col-md-3">
                <label class="control-label"><?php echo $patientRow["patient_email"];  ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col-md-3 ">
                <label class="control-label">Gender &nbsp;</label>
            </div>
            <div class="col-md-3">
                <?php  echo  $patient_gender=($patientRow["patient_gender"]==0)?"Male":"Female" ?>
            </div>
            <div class="col-md-3 ">
                <label class="control-label">Age &nbsp;</label>
            </div>
            <div class="col-md-3">
                <label class="control-label"><?php echo $patientRow["patient_age"];  ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col-md-3 ">
                <label class="control-label">Contact Number &nbsp;</label>
            </div>
            <div class="col-md-3">
                <label class="control-label"><?php echo $patientRow["patient_cno"];  ?></label>
            </div>

            <div class="col-md-3 ">
                <label class="control-label">Address &nbsp;</label>
            </div>
            <div class="col-md-3">
                <label class="control-label"><?php echo $patientRow["patient_no"].",".$patientRow["patient_street"].",".$patientRow["patient_city"];?></label>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="../js/patient_validation.js"></script>
<script type="text/javascript">

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#prev_img')
                    .attr('src', e.target.result)
                    .height(70)
                    .width(80);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
