<?php
include '../includes/header.php';
include '../model/schedule_model.php';
$scheduleObj = new Schedule();
$scheduleResult=$scheduleObj->getAllSchedule();
?>
<title>VIEW SCHEDULE</title>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3 align="left" style="color: #006699"><img src="../images/calendar.png" width="50px" height="50px"/> VIEW SCHEDULE</h3>
        </div>

        <div class="col-md-4">
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
        <div class="col-md-2">
            <a href="add_schedule.php" class="btn btn-block btn-primary">
                <i class="fa fa-plus"></i>&nbsp;Add Schedule
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Schedule</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-responsive-*" id="myTable">
                <thead>
                <tr>
                    <th scope="col">Schedule Id</th>
                    <th scope="col">Dentist Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Option</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($scheduleRow=$scheduleResult->fetch_assoc()){
                    $scheduleId =$scheduleRow ["schedule_id"];
                    $scheduleId = base64_encode($scheduleId);
                    ?>
                    <tr id="<?php echo $scheduleRow ["schedule_id"]; ?>">
                        <td><?php echo $scheduleRow["schedule_id"]; ?></td>
                        <td><?php echo $scheduleRow["emp_fname"] . " " . $scheduleRow['emp_lname']; ?></td>
                        <td><?php echo $scheduleRow["schedule_date"]; ?></td>
                        <td><?php echo $scheduleRow["start_time"]; ?></td>
                        <td><?php echo $scheduleRow["end_time"]; ?></td>
                        <td><?php echo $scheduleRow["duration"]; ?></td>
                        <td>
                            <a href="#" class="btn btn-outline-danger value="Delete"
                               onclick="deleteRow(<?php echo $scheduleRow ["schedule_id"]; ?>)">
                                <i class="fa fa-trash"></i>&nbsp;Delete
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
<?php include "../includes/footer.php"; ?>
 <script>
        function deleteRow(scheduleId) {
            if(confirm("Do you want to delete schedule " + scheduleId)){
                $.post('../controller/scheduleController.php', {
                    status: 'delete_schedule',
                    scheduleId: scheduleId
                }, function(response){

                    $("#" + scheduleId).remove();
                });
            }
        }
        var url = window.location.href;
        var spliturl = url.split("?")[0];
        var newspliturl = spliturl.split("localhost")[1];
        window.history.pushState({},document.title,"" + newspliturl);
 </script>


