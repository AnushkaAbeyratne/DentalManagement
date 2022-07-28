<?php
include '../includes/header.php';
include '../model/employee_model.php';
$empObj= new Employee();
$empResult=$empObj->getUserRole();

?>
    <title>ADD USER</title>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 5em;">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h3 align="left" style="color: #006699"><img src="../images/add.png" width="60px" height="60px"/>
                    <?php echo strtoupper('Add new User')?>
                </h3>
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
                            $msg= base64_decode($msg);
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
                        <li class="breadcrumb-item"><a href="emp_Mgt.php">User</a></li>
                        <li class="breadcrumb-item"><a href="view_user.php">View User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add User</li>
                    </ol>
                </nav>
            </div>
        </div>
        <form id="addUsers" enctype="multipart/form-data" method="post" action="../controller/employeeController.php?status=add_users">
            <div class="row">
                <div class="col-md-3 ">
                    <label class="control-label">Emp Id </label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="emp_id" placeholder="EMP" class="form-control" id="emp_id" list="searchEmp" value=""
                           autocomplete="off"/>
                    <div>
                        <datalist id="searchEmp">
                            <option value="">
                        </datalist>
                    </div>
                </div>
                <div class="col-md-3 ">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label class="control-label">Full Name </label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="emp_fname" placeholder="First Name" class="form-control" id="emp_fname" readonly="readonly"/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label class="control-label">Email </label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="emp_email" placeholder="Email" class="form-control" id="emp_email" readonly="readonly"/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3 ">
                    <label class="control-label">Password (NIC) </label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="emp_nic" placeholder="NIC" class="form-control" id="emp_nic" readonly="readonly"/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3 ">
                    <label class="control-label">User Role </label>
                </div>
                <div class="col-md-9">
                    <select class="form-control" name="user_role" id="user_role_id">
                        <option value=" " selected >Select User Role</option>
                        <?php
                        while($row=$empResult->fetch_assoc()){
                        ?>
                            <option value="<?php echo $row['role_id'];?>"><?php echo $row['role_name'];?></option>
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
                <div class="col-md-8">&nbsp;</div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-block btn-primary">
                        <i class="fa fa-download"></i> Save
                    </button>
                </div>
                <div class="col-md-2">
                    <button type="reset" class="btn  btn-block btn-danger">
                        <i class="fa fa-recycle"></i> Reset
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

