<?php
include '../includes/header.php';
include '../model/patient_model.php';
include '../model/schedule_model.php';
include '../model/appointment_model.php';
$patientObj = new Patient();
$patientResult = $patientObj->getAllPatients();

$scheduleObj= new Schedule();
$scheduleResult = $scheduleObj->getAllDentist();

$appointmentObj= new Appointment();
$appointmentResult = $appointmentObj->getAllTreatment();

?>
    <title>ADD APPOINTMENT</title>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h3 align="left" style="color: #006699"><img src="../images/appointment.png" width="60px" height="60px" />&nbsp;
                    <?php echo strtoupper('Add appointment')?></h3>
            </div>

            <div class="col-md-4">
                <?php
                if(isset($_GET["msg"]))
                {
                    ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger">
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
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="view_appointment.php">View Appointment</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Appointment</li>
                    </ol>
                </nav>
            </div>
        </div>
        <br>
        <form id="addAppointment" enctype="multipart/form-data" method="post" action="../controller/appointmentController.php?status=add_appointment">
            <div class="row">
                <div class="col-md-3 ">
                    <label class="control-label">Patient</label>
                </div>
                <div class="col-md-3">
                    <select class="form-control" name="patient_id" id="patient_id">
                        <option value="">Select Patient</option>
                        <?php
                        while($row = $patientResult->fetch_assoc()){
                            ?>
                            <option value="<?php echo $row['patient_id']; ?>">
                                <?php echo $row['patient_fname'] . " ". $row['patient_lname']; ?>
                            </option>
                            <?php
                        }
                        ?>

                    </select>
                </div>
                <div class="col-md-3 ">
                    <label class="control-label">Doctor</label>
                </div>
                <div class="col-md-3">
                    <select name="dentist_id" class="form-control" id="dentist_id">
                        <option value="">Select Doctor</option>
                        <?php
                        while($row = $scheduleResult->fetch_assoc()){
                            ?>
                            <option value="<?php echo $row['employee_emp_id']; ?>">
                                <?php echo $row['emp_fname'] . " ". $row['emp_lname']; ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-3 ">
                    <label class="control-label">Date</label>
                </div>
                <div class="col-md-3">
                    <select name="schedule_date" class="form-control"
                            id="schedule_date">
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-md-3 ">
                    <label class="control-label">Available Timeslots</label>
                </div>
                <div class="col-md-3">
                    <select name="schedule_time" class="form-control"
                            id="schedule_time">
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="control-label">Treatment Type</label>
                </div>
                <div class="col-md-3">
                    <select name="treatment_type" class="form-control" id="treatment_type">
                        <option value="">Select </option>
                        <?php
                        while ($row=$appointmentResult->fetch_assoc()){
                            ?>
                            <option value="<?php echo $row["treatment_id"];?>">
                                <?php echo $row["treatment_name"];?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-9">
                    <button id="submit" style="width:250px;" class="btn btn-primary">
                        <i class="fa fa-download"></i> Save
                    </button>
                    &nbsp;
                    <button type="reset" style="width:250px;" class="btn btn-danger">
                        <i class="fa fa-recycle"></i> Reset
                    </button>
                </div>
            </div>
        </form>
    </div>


<?php include '../includes/footer.php'; ?>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#prev_img')
                    .attr('src', e.target.result)
                    .height(70)
                    .width(80);};
            reader.readAsDataURL(input.files[0]);
        }
    }

        $("#dentist_id").change(function() {
            var empId = $("#dentist_id").val();

            if (empId === '') {
                $("#schedule_date").html("<option value=''>---</option>");
                return;
            }
            $.post('../controller/scheduleController.php', {
                status: 'get_schedules',
                employee_emp_id: empId
            }, function (response) {
                $("#schedule_date").html(response);
            });
        });
            $("#schedule_date").change(function () {
                var schedule_date = $("#schedule_date").val();
                var dentistId = $("#dentist_id").val();
                console.log(schedule_date);
                console.log(dentistId);
                if (schedule_date === '') {
                    $("#schedule_time").html("<option value=''>---</option>");
                    return;
                }
                $.post('../controller/scheduleController.php', {
                    status: 'get_time',
                    schedule_date: schedule_date,
                    dentist_id: dentistId
                }, function (response) {
                    console.log(response);
                    $("#schedule_time").html(response);
                });
            });
    </script>


