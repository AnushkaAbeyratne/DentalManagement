<?php
include '../includes/header.php';
include '../model/schedule_model.php';
$scheduleObj= new Schedule();
$scheduleResult = $scheduleObj->getAllDentist();
?>
    <title>ADD SCHEDULE</title>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h3 align="left" style="color: #006699"><img src="../images/add-event.png" width="60px" height="60px" />
                    <?php echo strtoupper('Add schedule')?></h3>
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
                        <li class="breadcrumb-item"><a href="view_schedule.php">View Schedule</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Schedule</li>
                    </ol>
                </nav>
            </div>
        </div>
        <br>
        <form id="addSchedule" method="post" enctype="multipart/form-data" action="../controller/scheduleController.php?status=add_schedule">
            <div class="row">
                <div class="col-md-3 ">
                    <label class="control-label">Dentist</label>
                </div>
                <div class="col-md-3">
                    <select name="dentist" class="form-control" id="dentist_id">
                        <option value="">Select Dentist</option>
                        <?php
                        while($row = $scheduleResult->fetch_assoc()){
                            ?>
                            <option value="<?php echo $row['employee_emp_id'];?>">
                                <?php echo $row['emp_fname'] . " ". $row['emp_lname'];?>
                            </option>
                            <?php
                            }
                           ?>
                    </select>
                </div>
                <div class="col-md-3 ">
                    <label class="control-label">Date</label>
                </div>
                <div class="col-md-3">
                    <input type="date" name="date" min="<?php echo date('Y-m-d') ?>"
                           class="form-control" id="date" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3 ">
                    <label class="control-label" id="time">Start Time</label>
                </div>
                <div class="col-md-3">
                    <input type="time" name="startTime" class="form-control" id="startTime" />
                </div>
                <div class="col-md-3 ">
                    <label class="control-label">End Time</label>
                </div>
                <div class="col-md-3">
                    <input type="time" name="endTime" class="form-control" id="endTime" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label class="control-label">Duration</label>
                </div>
                <div class="col-md-3">
                    <select name="interval" class="form-control" id="interval">
                        <option value=""></option>
                        <option value="15">15 minutes</option>
                        <option value="20">20 minutes</option>
                        <option value="30">30 minutes</option>
                        <option value="45">45 minutes</option>
                        <option value="60">60 minutes</option>
                        <option value="90">90 minutes</option>
                    </select>
                </div>
                <div class="col-md-3 ">
                    <label class="control-label">Timeslots</label>
                </div>
                <div class="col-md-3">
                    <div id="timeslots" name="timeslots[]"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-9">
                    <button id="submit" style="width:250px; height: 50px;" class="btn btn-primary">
                        <i class="fa fa-download"></i> Save
                    </button>
                    &nbsp;
                    <button type="reset" style="width:250px; height: 50px;" class="btn btn-danger">
                        <i class="fa fa-recycle"></i> Reset
                    </button>
                </div>
            </div>
        </form>
    </div>
<?php include '../includes/footer.php'; ?>
<script>
    var url = window.location.href;
    var spliturl = url.split("?")[0];
    var newspliturl = spliturl.split("localhost")[1];
    window.history.pushState({},document.title,"" + newspliturl);
</script>


