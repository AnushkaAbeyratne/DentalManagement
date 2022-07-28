<?php
include '../includes/header.php';
include '../model/employee_model.php';
    $empObj = new Employee();
    if(!isset($_REQUEST["emp_id"]))
    {
        ?>
        <script>
            window.location="../index.php"
        </script>
        <?php
    }
    $empId = $_REQUEST["emp_id"];
    $empId = base64_decode($empId);
    $empResult = $empObj->viewEmployees($empId);
    $empRow = $empResult->fetch_assoc();

?>
    <title>EMPLOYEE DETAILS</title>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <h3 align="left" style="color: #006699"><img src="../images/details.png" width="50px" height="50px"/>&nbsp;
                    EMPLOYEE DETAILS
                </h3>
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
                        <li class="breadcrumb-item"><a href="view_employee.php">View Employee</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Employee Details</li>
                    </ol>
                </nav>
            </div>
        </div>

        <form id="addEmployee" enctype="multipart/form-data" method="post" action="../controller/employeeController.php?status=add_employee">
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">&nbsp;</div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <img id="prev_img"  class="rounded-circle" src="../images/user_image/<?php  echo $empRow["emp_image"];  ?>"
                         width="160px" height="150px"/>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">&nbsp;</div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <label class="control-label"> Name </label>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <label class="control-label"><?php echo $empRow["emp_fname"]." ".$empRow["emp_lname"];  ?></label>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">&nbsp;</div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <label class="control-label"> Email </label>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <label class="control-label"><?php echo $empRow["emp_email"];  ?></label>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">&nbsp;</div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <label class="control-label"> Gender &nbsp;</label>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <?php  echo  $gender=($empRow["emp_gender"]==0)?"Male":"Female" ?>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">&nbsp;</div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <label class="control-label"> NIC &nbsp;</label>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <label class="control-label"><?php echo $empRow["emp_nic"];  ?></label>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">&nbsp;</div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <label class="control-label"> DOB &nbsp;</label>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <label class="control-label"><?php echo $empRow["emp_dob"];  ?></label>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">&nbsp;</div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <label class="control-label"> Telephone Number  &nbsp;</label>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <label class="control-label"><?php echo $empRow["emp_cno1"];  ?></label>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">&nbsp;</div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <label class="control-label"> Mobile Number &nbsp;</label>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <label class="control-label"><?php echo $empRow["emp_cno2"];  ?></label>
                </div>
            </div>
        </form>
    </div>
<?php include '../includes/footer.php';?>
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

