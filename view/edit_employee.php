<?php
include '../includes/header.php';
include '../model/employee_model.php';
    $empObj = new Employee();
    if(!isset($_REQUEST["emp_id"]))
    {
        ?>
        <script> window.location="../index.php"</script>
        <?php
    }
    $empId=$_REQUEST["emp_id"];
    $empId=base64_decode($empId);
    $empResult=$empObj->viewEmployees($empId);
    $empRow=$empResult->fetch_assoc();

    ?>
    <title>EDIT EMPLOYEE</title>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3 align="left" style="color: #006699"><img src="../images/edit%20(1).png" width="50px" height="50px"/>
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

        <form id="addEmployee" enctype="multipart/form-data" method="post" action="../controller/employeeController.php?status=edit_employee">
            <input type="hidden" name="emp_id" value="<?php echo $empId;?>"/>
            <div class="row">
                <div class="col-md-3 ">
                    <label class="control-label">Title</label>
                </div>
                <div class="col-md-3 ">
                    <input type="text" name="emp_title" placeholder="First Name" class="form-control"
                           value="<?php echo $empRow["emp_title"]; ?>" id="emp_title" />
                </div>

                <div class="col-md-3 ">
                    <label class="control-label">First Name </label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="emp_fname" placeholder="First Name" class="form-control"
                           value="<?php echo $empRow["emp_fname"]; ?>" id="emp_fname" />
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
                    <input type="text" name="emp_lname" placeholder="Last Name" class="form-control"
                           value="<?php echo $empRow["emp_lname"]; ?>"id="emp_lname"/>
                </div>
                <div class="col-md-3">
                    <label class="control-label"> Email &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="emp_email" placeholder="Email"class="form-control"
                           readonly="readonly"  value="<?php echo $empRow["emp_email"]; ?>" id="emp_email"/>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="control-label"> Gender &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="radio" name="emp_gender" value="0" checked="checked"  />&nbsp;<label class="control-label">Male</label>
                    &nbsp;

                    <input type="radio" name="emp_gender" value="1" />&nbsp;<label class="control-label">Female</label>
                </div>

                <div class="col-md-3 ">
                    <label class="control-label">NIC &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="emp_nic" placeholder="NIC" class="form-control" readonly
                           value="<?php echo $empRow["emp_nic"]; ?>"id="emp_nic" />
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-3 ">
                    <label class="control-label"> DOB &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="date" name="emp_dob" class="form-control"
                               value="<?php echo $empRow["emp_dob"]; ?>"id="emp_dob" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

                <div class="col-md-3">
                    <label class="control-label"> Telephone Number</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="emp_cno1" placeholder="Telephone Number"class="form-control"
                           value="<?php echo $empRow["emp_cno1"]; ?>"id="emp_cno1" />
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="control-label"> Mobile Number &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="emp_cno2" placeholder="Mobile Number"class="form-control"
                           value="<?php echo $empRow["emp_cno2"]; ?>"id="emp_cno2" />
                </div>

                <div class="col-md-3">
                    <label class="control-label"> Image &nbsp;</label>
                </div>
                <div class="col-md-3">
                    <input type="file" name="emp_image" id="emp_image" onchange="readURL(this)"  class="form-control" />
                    <br/>
                    <img id="prev_img"  src="../images/user_image/<?php echo $empRow["emp_image"];  ?>"
                         width="60px" height="80px"/>
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


</html>

