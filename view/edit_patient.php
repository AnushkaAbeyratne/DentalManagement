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
    $patientId =  base64_decode($patientId);
    $patientResult = $patientObj->viewPatients($patientId);
    $patientRow = $patientResult->fetch_assoc();

    ?>
<title>EDIT PATIENT</title>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3 align="left" style="color: #006699">EDIT PATIENT</h3>
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
                    <li class="breadcrumb-item"><a href="emp_Mgt.php">User</a></li>
                    <li class="breadcrumb-item"><a href="view_patient.php">View Patient</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Patient Details</li>
                </ol>
            </nav>
        </div>
    </div>

    <form id="addPatient" enctype="multipart/form-data" method="post" action="../controller/patientController.php?status=edit_patient">
        <input type="hidden" name="pat_id" value="<?php echo $patientId;?>"/>
        <div class="row">
            <div class="col-md-3 ">
                <label class="control-label">Title</label>
            </div>
            <div class="col-md-3 ">
                <input type="text" name="pat_title" placeholder="First Name" class="form-control"
                       value="<?php echo $patientRow["patient_title"]; ?>" id="pat_title" />
            </div>

            <div class="col-md-3 ">
                <label class="control-label">First Name </label>
            </div>
            <div class="col-md-3">
                <input type="text" name="pat_fname" placeholder="First Name" class="form-control"
                       value="<?php echo $patientRow["patient_fname"]; ?>" id="pat_fname" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col-md-3 ">
                <label class="control-label">Last Name &nbsp;</label>
            </div>
            <div class="col-md-3 ">
                <input type="text" name="pat_lname" placeholder="Last Name" class="form-control"
                       value="<?php echo $patientRow["patient_lname"]; ?>"id="pat_lname"/>
            </div>
            <div class="col-md-3">
                <label class="control-label"> Email &nbsp;</label>
            </div>
            <div class="col-md-3">
                <input type="text" name="pat_email" placeholder="Email"class="form-control"
                      value="<?php echo $patientRow["patient_email"]; ?>" id="pat_email"/>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-3 ">
                <label class="control-label">Age &nbsp;</label>
            </div>
            <div class="col-md-3">
                <input type="text" name="pat_age" placeholder="NIC" class="form-control"
                       value="<?php echo $patientRow["patient_age"]; ?>"id="pat_age" />
            </div>
            <div class="col-md-3">
                <label class="control-label"> Gender &nbsp;</label>
            </div>
            <div class="col-md-3">
                <input type="radio" name="pat_gender" value="0" checked="checked"  />&nbsp;<label class="control-label">Male</label>
                &nbsp;

                <input type="radio" name="pat_gender" value="1" />&nbsp;<label class="control-label">Female</label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label class="control-label"> Contact Number</label>
            </div>
            <div class="col-md-3">
                <input type="text" name="pat_cno" placeholder="Telephone Number"class="form-control"
                       value="<?php echo $patientRow["patient_cno"]; ?>" id="pat_cno" />
            </div>
            <div class="col-md-6">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label class="control-label"> Address &nbsp;</label>
            </div>
            <div class="col-md-3">
                <input type="text" name="pat_no" placeholder="No." class="form-control"
                       value="<?php echo $patientRow["patient_no"]; ?>" id="pat_no" />
            </div>
            <div class="col-md-3">
                <input type="text" name="pat_street" placeholder="Street" class="form-control"
                       value="<?php echo $patientRow["patient_street"]; ?>" id="pat_street" />
            </div>
            <div class="col-md-3">
                <input type="text" name="pat_city" placeholder="City" class="form-control" i
                       value="<?php echo $patientRow["patient_city"]; ?>" d="pat_city" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-2">
                <button id="submit" class="btn btn-block btn-primary">&nbsp;Update</button>
            </div>
            <div class="col-md-2">
                <button type="reset" class="btn btn-block btn-danger">&nbsp;Reset</button>
            </div>
            <div class="col-md-4">&nbsp;</div>
        </div>
    </form>
</div>

<script type="text/javascript" src="../js/user_validation.js"></script>
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


