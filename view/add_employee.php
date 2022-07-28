<?php
include '../includes/header.php';
include '../model/employee_model.php';
$empObj= new Employee();
$EmployeeNewId=$empObj->getEmpId();
?>
    <title>ADD EMPLOYEE</title>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 6em;">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h3 align="left" style="color: #006699"><img src="../images/add-user%20(2).png" width="50px" height="50px"/>&nbsp;
                    <?php echo strtoupper('Add new employee')?></h3>
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
                        <li class="breadcrumb-item"><a href="emp_Mgt.php">Employee</a></li>
                        <li class="breadcrumb-item"><a href="view_employee.php">View Employee</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Employee</li>
                    </ol>
                </nav>
            </div>
        </div>
        <form id="addEmployee" enctype="multipart/form-data" method="post" action="../controller/employeeController.php?status=add_employee">
            <div class="row">
                <div class="col-md-3">
                    <label class="control-label">Emp Id </label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="emp_id" placeholder="EMP00000" class="form-control" id="emp_id"
                           readonly="readonly" value="<?php echo $EmployeeNewId;?>"/>
                </div>
                <div class="col-md-3 ">
                    <label class="control-label">Title</label>
                </div>
                <div class="col-md-3">
                    <select class="form-control" name="emp_title" id="emp_title">
                        <option value="">Select Title</option>
                        <option value="1">Mr</option>
                        <option value="2">Mrs</option>
                        <option value="3">Miss</option>
                        <option value="4">Dr</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3 ">
                    <label class="control-label">First Name </label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="emp_fname" placeholder="First Name" class="form-control" id="emp_fname"/>
                </div>
                <div class="col-md-3 ">
                    <label class="control-label">Last Name </label>
                </div>
                <div class="col-md-3 ">
                    <input type="text" name="emp_lname" placeholder="Last Name" class="form-control" id="emp_lname"/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label class="control-label">Email </label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="emp_email" placeholder="Email" class="form-control" id="emp_email"/>
                </div>
                <div class="col-md-3">
                    <label class="control-label">Gender </label>
                </div>
                <div class="col-md-3">
                    <input type="radio" name="emp_gender" value="0" checked="checked"/>&nbsp;<label class="control-label">Male</label>
                    &nbsp;
                    <input type="radio" name="emp_gender" value="1" />&nbsp;<label class="control-label">Female</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3 ">
                    <label class="control-label">NIC </label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="emp_nic" placeholder="NIC" class="form-control" id="emp_nic" />
                </div>
                <div class="col-md-3 ">
                    <label class="control-label">DOB </label>
                </div>
                <div class="col-md-3">
                    <input type="date" name="emp_dob" class="form-control" id="emp_dob"/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label class="control-label">Telephone Number </label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="emp_cno1" placeholder="+94111111111"class="form-control" id="emp_cno1" />
                </div>
                <div class="col-md-3">
                    <label class="control-label">Mobile Number </label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="emp_cno2" placeholder="+94711111111"class="form-control" id="emp_cno2" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label class="control-label">Image </label>
                </div>
                <div class="col-md-3">
                    <input type="file" name="emp_image" id="emp_image" onchange="readURL(this)"  class="form-control" />
                    <img id="prev_img"/>
                </div>
                <div class="col-md-6">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-9">
                    <button id="submit" style="width:250px;" class="btn btn-primary">
                        <i class="fa fa-download"></i>&nbsp; SAVE
                    </button>
                    &nbsp;
                    <button type="reset" style="width:250px;" class="btn btn-danger">
                        <i class="fa fa-recycle"></i>&nbsp; RESET
                    </button>
                </div>
            </div>
        </form>
    </div>
   <?php include '../includes/footer.php'; ?>
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
